# git log --pretty=format:"| %an | %s %N |" > logs/table.md
# add table headers
# (\d?\.?\d+ ?(minutes|hours|seconds)) --> | $1

import re

timeregex = r'\| ([\w]* [\w]*) *\| .* \| (\d*\.?\d+?) ?(minutes|mins|hours|seconds) *\|'

people = {}  # 'Name': [Hours, Minutes, Seconds]

with open('table.md') as tablefile:
    for line in tablefile:
        match = re.search(timeregex, line)
        if match is not None:
            # print(match.group(1), match.group(2), match.group(3))

            name = match.group(1)
            time = float(match.group(2))
            timetype = match.group(3)

            if name not in people:
                people[name] = [0, 0, 0]

            if timetype == 'hours':
                people[name][0] += time
            elif timetype == 'minutes' or timetype == 'mins':
                people[name][1] += time
            elif timetype == 'seconds':
                people[name][2] += time

for name in people:
    # simplified = []
    hours, minutes, seconds = people[name]

    # print(hours, minutes, seconds)

    minutes += int(seconds / 60)
    seconds %= 60
    hours += int(minutes / 60)
    minutes %= 60

    people[name] = [hours, minutes, seconds]

    print(name, hours, minutes, seconds)
