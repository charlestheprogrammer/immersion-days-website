import random

lastPlay = -1 #-1 if less, 1 if more, 0 if good
lastInput = -1 # your last input

mini = 0

maxi = 0

def nextTurn(maxRange):
    global mini
    global maxi
    if (lastInput == -1):
        maxi = maxRange
        mini = 0
    if (lastPlay == -1):
        mini = lastInput
    elif(lastPlay == 1):
        maxi = lastInput
    return int((maxi + mini) / 2)