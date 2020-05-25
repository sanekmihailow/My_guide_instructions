#!/bin/bash

 list="$(ls -d <path-to_folder>/*/)"

du -sh $list
