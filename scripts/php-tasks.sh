#!/bin/bash
set -e

# Routines

analyse () {
    echo - - - - -
    echo Analysing code...
    sleep 2
    vendor/bin/phpstan analyse .
}

commit () {
    cd "../"
    git add coverage-report.txt
    git add private/env.example
}

env () {
    cd "private/"
    rm "env.example"
    cp ".env" "env.example"
    # Replaces [= "something in here"] to [= ""]
    sed -i -e "s/\( = \".*\"\)/ = \"\"/g" "env.example"
    # Removes commented lines
    sed -i -e "s/\(# .*\)//g" "env.example"
}

metrics () {
    echo - - - - -
    echo Generating metrics report...
    sleep 2
    phpmetrics --report-html="./metrics-report" ./
    echo - - - - -
}

sniff () {
    echo - - - - -
    printf "Checking style... "
    sleep 2
    phpcs -s
    printf "Passed!\n"
}

test () {
    echo - - - - -
    echo Running tests...
    sleep 2
    phpunit --bootstrap vendor/autoload.php src/ --whitelist src --coverage-html coverage-report --coverage-text=coverage-report.txt
}

all () {
    sniff
    analyse
    test
    metrics
    env
    commit
}

# Interactive Executor

function run() {
    if [ "$task" = "1" ] || [ "$task" = "" ]
    then
        sniff
        analyse
        test
    elif [ "$task" = "2" ]
    then
        all
    else
        echo Unknown command. Exiting...
    fi
}

# CLI Executor

if [ -z "$1" ]
then
    echo "Please select a task:"
    echo "(1) Sniff, analyse and test (Default)"
    echo "(2) Prepare commit"
    read task
    run $task
else
    case $1 in
        check)
            sniff
            analyse
            test
            echo - - - - -
            echo "All checks passed!"
            ;;
        commit)
            all
            ;;
        *)
            echo Unknown command. Exiting...
            ;;
    esac
fi

