#!/bin/bash
find . -type d -exec chmod 0755 {} \;
find . -type f -exec chmod 0644 {} \;
chown http:http -R ./website/var ./pimcore ./plugins