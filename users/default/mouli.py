def checkNumber(inputN, target, display = True):
    bot.lastInput = inputN
    if (inputN < target):
        if (display):
            print("Le nombre entré est trop petit")
        bot.lastPlay = -1
        return False
    if (inputN > target):
        if (display):
            print("Le nombre entré est trop grand")
        bot.lastPlay = 1
        return False
    if (display):
        print("Le nombre est bien", target, "c'est parfait")
    bot.lastPlay = 0
    return True


def game(target, tryN):
    while(tryN > 0):
        if (tryN != 1):
            inputS = input("(" + str(tryN) + " essais) Entrez votre nombre: ")
        else:
            inputS = input("(" + str(tryN) + " essai) Entrez votre nombre: ")
        try:
            inputN = int(inputS)
            if (checkNumber(inputN, target)):
                print("Trouvé en", tryN, "essai(s)")
                return
            tryN -= 1
        except:
            tryN -= 1
    print("C'est perdu, le nombre était", target)
    return




import random
import bot
import os

def gameMoulinette(tryN, maxRdn):
    target = random.randint(0, maxRdn)
    while (tryN > 0 and not(checkNumber(bot.nextTurn(maxRdn), target, False))):
        tryN -= 1
    if (tryN == 0):
        return (False, 0)
    return (True, tryN)

def getScore():
    __location__ = os.path.realpath(
    os.path.join(os.getcwd(), os.path.dirname(__file__)))

    f = open(os.path.join(__location__, 'bot.py'))

    all_of_it = f.read()

    f.close()

    index = 0

    while(all_of_it.find("import", index) != -1):
        index = all_of_it.find("import", index)
        index += 7
        s = ""
        while (all_of_it[index].isalpha()):
            s += all_of_it[index]
            index += 1
        if s != "random":
            return -51


    if all_of_it.find("print") != -1:
        return -17
    try:
        score = 0
        for i in range(100):
            bot.lastInput = -1
            play = gameMoulinette(50, 100)
            if (play[0]):
                score += play[1]
        for i in range(100):
            bot.lastInput = -1
            play = gameMoulinette(80, 1000)
            if (play[0]):
                score += play[1]
        for i in range(2000):
            bot.lastInput = -1
            play = gameMoulinette(100, 100000)
            if (play[0]):
                score += play[1]
        for i in range(1000):
            bot.lastInput = -1
            play = gameMoulinette(150, 1000000)
            if (play[0]):
                score += play[1]
        return score
    except:
        return -42


print(getScore())