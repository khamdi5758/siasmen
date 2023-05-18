import sys
import json

arrayString = sys.argv[1].split(",")
final = []

for i in range(len(arrayString)):
    final.append(arrayString[i].split("-"))



print(arrayString)
print("=========final===============")
print(final)
for a in range(1,len(final)):
    print("===")
    print(final[a][0])


# print(final[0][0])
# print("========================")
# print(final[1][0])
# print("========================")
# print(final[2][0])