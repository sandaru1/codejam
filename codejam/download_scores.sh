#!/bin/bash
for i in `seq 301 430`; do
  wget "http://code.google.com/codejam/contest/scoreboard/do?cmd=GetScoreboard&contest_id=90101&show_type=all&start_pos=$(($i*20+1))&views_time=1&views_file=0&csrfmiddlewaretoken=" -O "json/data$i" &
done
