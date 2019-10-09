#!/bin/bash
set -e

echo - - - - -
echo Dependencies installed.
echo - - - - -
echo Creating pre-commit git hook...
sleep 2
ln -s `pwd`/hooks/pre-commit `pwd`/.git/hooks/pre-commit
echo - - - - -
echo Pre-commit git hook created.