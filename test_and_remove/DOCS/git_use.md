
<d>
  <details>
    <summary> Links </summary>

# Links

[cheatshhet](https://about.gitlab.com/images/press/git-cheat-sheet.pdf)

[соглашение о коммитах](https://www.conventionalcommits.org/ru/v1.0.0/)

[Обнаружение ошибок с помощью Git](https://git-scm.com/book/ru/v2/%D0%98%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B-Git-%D0%9E%D0%B1%D0%BD%D0%B0%D1%80%D1%83%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5-%D0%BE%D1%88%D0%B8%D0%B1%D0%BE%D0%BA-%D1%81-%D0%BF%D0%BE%D0%BC%D0%BE%D1%89%D1%8C%D1%8E-Git)

[Интерактивное индексирование](https://git-scm.com/book/ru/v2/%D0%98%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B-Git-%D0%98%D0%BD%D1%82%D0%B5%D1%80%D0%B0%D0%BA%D1%82%D0%B8%D0%B2%D0%BD%D0%BE%D0%B5-%D0%B8%D0%BD%D0%B4%D0%B5%D0%BA%D1%81%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5)

[правильно составлять описания коммитов](https://ru.hexlet.io/blog/posts/git-commit-message)

[Ветки в GIT](https://learngitbranching.js.org/?locale=ru_RU)

[gitignore](https://github.com/Hexlet/hexlet-cv/blob/main/.gitignore)

[Коллекция полезных gitignore для всех ситуаций](https://github.com/github/gitignore)

[реккомендации gitignore](https://www.atlassian.com/ru/git/tutorials/saving-changes/gitignore)

[git stash](https://git-scm.com/book/ru/v2/%D0%98%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B-Git-%D0%9F%D1%80%D0%B8%D0%BF%D1%80%D1%8F%D1%82%D1%8B%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5-%D0%B8-%D0%BE%D1%87%D0%B8%D1%81%D1%82%D0%BA%D0%B0)

[]()


</details>
</d>

> установить git https://www.youtube.com/watch?v=2j7fD92g-gE&ab_channel=Simplilearn


```nginx
mkdir -p GIT_ACCOUNTS/github/TEST_AC/test
cd GIT_ACCOUNTS/github/TEST_AC/test
# real name hithub account
git config --global user.name exampleaccount-github
git config --global user.email exaplemail@gmail.com
# use ssh-key for push without passwords, your need add repo github not https if u use ssh-keys
ssh-keygen -t rsa -b 4096 -f example
cat ~/.ssh/example.pub # https://github.com/settings/ssh/new
eval "$(ssh-agent -s)"
ssh-add ~/.ssh/example
git init
git status
echo 'readme test' >> README.md
git status
git add README.md
git status
git commit -m 'add README.md'
git status
#git remote rm origin
git remote add origin git@github.com:exampleaccount-github/test_demo.git
git remote -v
git branch -M main
git push -u origin main
#git push origin master
```
> cat ~/.ssh/config
```
Host github.com
  HostName github.com
  User git
  IdentityFile ~/.ssh/github_rsa
```

```nginx
git pull --rebase
git add . #добавляет файлы из раб. директории в индекс
git rm PEOPLE.md
git rm --cached PEOPLE.md #удалить файл из репозитория, но не из рабочей области
git restore hexlet.txt
git diff #Для перемещения вниз по дифу нужно нажать f, для перемещения наверх — b или u. Для выхода из режима просмотра нажмите q.
git diff --staged
git log
git log -p
git log --oneline
git log -p --oneline -- todo.md #сли добавить имя файла в конец команды git log, отделив его знаками --, можно увидеть, в каких коммитах он изменялся
git log --name-status #Метка "A" перед файлом, сокращение от "Added"
git log --graph #показывает связь коммитов, дату и автора

#git show 5120bea3e5528c29f8d1da43731cbe895892eb6d
 git show 5120bea3
git blame INFO.md
git grep -i hexlet(line)
git grep Hexlet 5120bea3
git grep Hexlet $(git rev-list --all)
git clean -fd #очистка Неотслеживаемые файлы
git restore INFO.md #отмена изменений в файле на последний коммит
git restore --staged INFO.md #изменения, сделанные в файле, из индекса в рабочую директорию
    git restore hexlet.txt
    git restore --staged index.md index.html
    git restore index.html
    git clean -fd
git revert aa600a43cb1 #отмена изменений указанного коммита.Фактически она сводится к созданию еще одного коммита, который выполняет изменения
git reset --hard HEAD~ #Важно, что этого мы не делали git push. Т.е. если локальный коммит то его можно удалить, иначе нет, все сломается. HEAD~ означает "один коммит от последнего коммита". Если бы мы хотели удалить два последних коммита, то могли бы написать HEAD~2. Если не указывать флаг --hard, то по умолчанию подразумевается флаг --mixed. В таком варианте reset отправляет изменения последнего коммита в рабочую директорию. Затем их можно исправить или отменить и выполнить новый коммит.
git commit --amend --no-edit #добавить изменения в текущий коммит
git commit -am 'do something' #Ну и совсем страшная, но полезная команда — это коммит с одновременным добавлением всего в индекс
git add -i  #Интерактивный режим добавления в индекс
git checkout e6f625c #Переключимся на момент, когда был выполнен коммит. Загружает в рабочую директорию состояние репозитория на момент нужного коммита
git switch e6f625c
git checkout main #Переключимся на текущее изменение
git switch -     #Переключимся на текущее изменение
git branch # показывает в какой ветке нахожусь

touch .gitignore
git add .gitignore
git commit -m 'update gitignore'
```

```


```

# ==========================================================================================

```nginx
Ситуации:
1) # если забыл добвить изменения в stages index (т.е. они untracked) и сделал коммит, или необходить переименовать коммит.
    git add .
    git commit --amend 
    # Тут происходит изменение хэша коммита, соотвественно предыдущий коммит заменяется новым (origin-*-* получаем origin-*)
    git commit --amend -m '<new title commit>' # обновить название коммита
    git commit --amend --no-edit # дбавить файл(ы) к коммиту без изменения названия коммита

2) # Откат изменений
    *a) checkout для отката определнных изменений до последнего коммита
      git checkout Readme.md package.json
    # В этом примере мы откатили определенные файлы которые нам нужно было откатить, а остальные оставили с нашими изменениями (к примеру измененными остались lonly.js text.txt)
    *b) reset для отката всех изменений до последнего коммита 
      git reset --hard
    # В этом случае мы затерли все нашего изменения сделанные с последнего коммита безвозвратно
    *b1) сбросить состояние ветки до определенного коммита, например фича уже не нужна
      git reset --hard <hash нужного коммита>
      #или
      git reset --soft <hash нужного коммита>
      # В этом случае сбрасываем состояние до такой-то ветки, но сохраняем наши файла, которые остались в steaged index
      git diff --staged
      # --mixed #откатывает, сохраняя Untracked и Staged, используется по умолчанию. Т.е.откатывает git add до modified 
      # --soft #откатывает, сохраняя твой текущей Stageded. Т.е. откат git commit до git add
      # --hard #откатывает все
    *c) revert для отката своих изменений, которые сломали production (master)
      git revert <hash commit который сломал>
    # вначале коммита будет rever <описание комимтас выбранного с hash>

3) #Сохранить текущие изменения в stash. Например необходимо сохранить изменения которые были, но пушить пока рано и дали задание для другой ветки на которую надо перейти
    #Например перейдем в другую ветку, сохранив наши изменения текущей ветки, которые е нужны в другой ветке
    git stash #Создаст stash c hash, и присвоит stash id.
    git stash save <"new title"> # создаст stash с описанием new title вмевсто hash.
    git stash -u # добавит к полке еще untracked files 
    git checkot <brang>
    git checkout master
    # git stash list - для простора идентификаторов полок
    git stash apply <number из git stash list> #возьмет с полки изменения, сохраняя при этом stash id. самый первый у нас стал нулевым. Например 0   
    git stash apple # возбмет с полки самый последний из стека, сохраняя при этом stash id. Аналог Ctrl+c; Ctr+v
    git stash pop <number из git stash list> # #возьмет с полки изменения, удаоив при этом stash id. Аналог Ctrl+x; Ctr+v
    git checkout stash@<number id из git stash list> -- log.txt # Достаем из полки только конкретный файл, к примеру  log.txt

4) #Почистить working directory от ненужных файлов, т.е. их вообще не нужно сохранять
    git clean - m # покажет файлы которые будут удалены
    # -d    - включить директории
    # -f -d - удалить включая директории

5) #Когда необходимо взять изменения перед пушем
    git pull origin <branch>
    git remote -v
    git push

6) #Когда необходимо перенести коммиты из одной ветки в другую
    
    *a) rebase #Меняем структуру коммитов и хэши соотвественно, отпочковывается от мастера 
    #
    #                /-feature---0---0---0    \=                          /-feature---0---0---0  |              /---feature
    # old master---0/---0---0---0---0        /=   ---0---0---0(cur master)/                      |---cur master/ 
    git checkot <branch>
    git rebase <branch> master
    # Необходимо ребейзить в основном, только когда вы одни работаете с этой feature веткой. Либо согласовать с коллегами чтобы они запулились перед вашим ребейзом. Иначе они потеряют все свои локальные изменения в working directory. Но история ветки при этом выглядит красиво. forcepush
    # При ребейзы меняются коммиты (нужно записывать коммиты от которых делалось ответвление до ребейза). Если вдруг после ребейза выходит ошибка.
    # Чтоб найти hash ветки от которой отпочковывался, если не записал стоит прибегнуть к reflog, который хранит ссылки
    git reflog
    git diff <hash old> <hash cur>

    *b) merge
    #
    #                  /-feature---0---0---0---------\                                      |-----feature---------\
    #   old master---0/---0---0---0---0(cur master)---\---0--(merge feature into master)    |---current master-----\----(merge)
    git checkout <branch>
    git merge <branch> master # мерджим коммиты из мастер в нашу ветку
    # Мерджить лучше, если удалось согласовать с коллегами ребейс, при этом структура хэщей не меняется, у коллег останутся их локальные изменения, а просто добавится новый коммит, который содержит merdge всех коммитов
    # --no-ff #
    # --f     #
    #[merge --no-ff vs --ff](https://stackoverflow.com/questions/9069061/what-effect-does-the-no-ff-flag-have-for-git-merge)
    #[sqash](https://medium.com/@mena.meseha/git-merge-vs-rebase-556563b26431)

7) #Когда необходимо объединить несколько запушенных коммитов в один или в несколько(меняет hash и историю коммита)
    *a) rebase --interactive
    git checkout <branch>
    git rebase -i HEAD~<numebr ahead>  #глянь выше что делает rebase
    #или 
    git rebase -i <hash с которого хотим начать squashing до последнего коммита>
    открывает интерактивное редактирование, где надо оставляем Pick, остальные sqash, закрываем
    оставляем нужные нам коммиты или оставляем один длинный коммит тайтл(который взял другие тайтл коммиты), закрываем
    # В этом варианте больше контроля над коммитами

    *b) sqash
    git checkout <master>
    git merge --squash <branch> #добавит изменения в staged index
    git commit -m "beaty commit"
    # Минус один коммит на всю ветку,
    # Плюсы, авторезолв мерджей. И возможность удалить branch

8) # Взять часть изменений(коммитов) из одной ветки в свою. (создает новый коммит)
    #
    # ---root---A---B\---C---D      | ---root---A---B\---C---D---/-F
    #                 \-E---F---G   |                 \-E------F/---G
    git checkout <master> #сначала зайти в ветку в которую мы хотим добавить изменения
    git cherry-pick <hash коммита>
    #-edit        #дает создать новый коммит тайтл
    #--no-commit  # берет все изменения из того коммита F и помещает его в твою working directory, не создавая новый коммит 

9) # Как неучитывать изменения в файле, который отслеживается git    
    git update-index --assume-unchandged <file>
    # Если необходимо вернуть отслеживание
    git update-index --no-assume-unchandged <file>
    # Из минусов если вас несколько в команде, и вам необходимо учитывать изменения файлов, коллегам тоже необходимо сделать --no--assume-unchantged, иначе они не смогут запушить, в git status ну увидят изменения, но гит будет ругаться что файл в мастере изменен.

10) # Фишки с git clone
    # Скопировать локальный репо
    git clone <path/local/repo> </path/new/local/repo> <folder>
    # Склонировать одну ветку
    git clone -b <branch> --single-branch <git@github.com:example/test.git> <folder>
    # Склонировать репозиторий с последними 5 коммитами
    git clone <git@github.com:example/test.git> --depth=5 <folder>




```
