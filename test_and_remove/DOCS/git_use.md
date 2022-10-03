
<d>
  <details>
    <summary> Links </summary>

# Links

[cheatshhet](https://about.gitlab.com/images/press/git-cheat-sheet.pdf)

[соглашение о коммитах](https://www.conventionalcommits.org/ru/v1.0.0/)

[Обнаружение ошибок с помощью Git](https://git-scm.com/book/ru/v2/%D0%98%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B-Git-%D0%9E%D0%B1%D0%BD%D0%B0%D1%80%D1%83%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5-%D0%BE%D1%88%D0%B8%D0%B1%D0%BE%D0%BA-%D1%81-%D0%BF%D0%BE%D0%BC%D0%BE%D1%89%D1%8C%D1%8E-Git)

[]()

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

git pull --rebase
git add .
git rm PEOPLE.md
git restore hexlet.txt
git diff #Для перемещения вниз по дифу нужно нажать f, для перемещения наверх — b или u. Для выхода из режима просмотра нажмите q.
git diff --staged
git log
git log -p
#git show 5120bea3e5528c29f8d1da43731cbe895892eb6d
 git show 5120bea3
git blame INFO.md
git grep -i hexlet(line)
git grep Hexlet 5120bea3
git grep Hexlet $(git rev-list --all)


```


