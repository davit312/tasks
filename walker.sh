#!/usr/bin/env bash

# this script walks through given path and recursively show all files
# containing in folder as script argument


walk() {

    while read -r file; do
        if [[ -d $1/$file ]]; then
            echo "Folder :: $1/$file"
            walk "$1/$file"
        else
            echo "File >>>> $1/$file"
        fi
    done < <(ls "$1"| cat)

}

walk $1
