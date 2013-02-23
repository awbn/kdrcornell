#!/bin/bash

# Install any pre-reqs before running main build tasks

# Install phing
command -v phing >/dev/null 2>&1 || {
	sudo pear channel-discover pear.phing.info
	sudo pear install phing/phing
}

# Rehash PHP environment
sudo command -v phpenv >/dev/null 2>&1 && phpenv rehash >/dev/null 2>&1 || { echo >&2 "phpenv not found.  Skipping."; }