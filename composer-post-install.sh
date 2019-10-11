#!/bin/bash
set -e

#Routines

env () {
    cd "private/"
    if ! [ -f ".env" ]; then
        cp "env.example" ".env"
        # Set ENVIRONMENT = "LOCAL"
        sed -i -e "s/\(ENVIRONMENT = \"\"\)/ENVIRONMENT = \"LOCAL\"/g" ".env"
        sleep 2
        printf "Done!\n"
    else
        printf "Skipped. File already exists.\n"
    fi
}

hook () {
    if [ -f `pwd`/.git/hooks/pre-commit ]; then
        rm `pwd`/.git/hooks/pre-commit
    fi
    ln -s `pwd`/hooks/pre-commit `pwd`/.git/hooks/pre-commit
}

#Main

echo Dependencies installed.
printf "Creating pre-commit git hook... "
hook
sleep 2
printf "Done!\n"
printf "Creating development .env file... "
env
echo Project installed!
printf "██████╗ ██╗     ███████╗ █████╗ ███████╗███████╗    ███████╗███████╗████████╗       ███████╗███╗   ██╗██╗   ██╗\n"
printf "██╔══██╗██║     ██╔════╝██╔══██╗██╔════╝██╔════╝    ██╔════╝██╔════╝╚══██╔══╝       ██╔════╝████╗  ██║██║   ██║\n"
printf "██████╔╝██║     █████╗  ███████║███████╗█████╗      ███████╗█████╗     ██║          █████╗  ██╔██╗ ██║██║   ██║\n"
printf "██╔═══╝ ██║     ██╔══╝  ██╔══██║╚════██║██╔══╝      ╚════██║██╔══╝     ██║          ██╔══╝  ██║╚██╗██║╚██╗ ██╔╝\n"
printf "██║     ███████╗███████╗██║  ██║███████║███████╗    ███████║███████╗   ██║       ██╗███████╗██║ ╚████║ ╚████╔╝\n" 
printf "╚═╝     ╚══════╝╚══════╝╚═╝  ╚═╝╚══════╝╚══════╝    ╚══════╝╚══════╝   ╚═╝       ╚═╝╚══════╝╚═╝  ╚═══╝  ╚═══╝\n"  
                                                                                                               