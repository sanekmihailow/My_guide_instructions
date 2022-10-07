
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
