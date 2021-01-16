Возникла ошибка при обновлении pacman
```python
error: cdrtools: signature from "Jerome Leclanche <jerome@leclan.ch>" is unknown trust
:: File /var/cache/pacman/pkg/cdrtools-3.02a09-4-x86_64.pkg.tar.zst is corrupted (invalid or corrupted package (PGP signature)).
Do you want to delete it? [Y/n] n
error: python-html5lib: signature from "Eli Schwartz <eschwartz@archlinux.org>" is unknown trust
:: File /var/cache/pacman/pkg/python-html5lib-1.1-5-any.pkg.tar.zst is corrupted (invalid or corrupted package (PGP signature)).
Do you want to delete it? [Y/n] n
error: qbittorrent: signature from "Eli Schwartz <eschwartz@archlinux.org>" is unknown trust
:: File /var/cache/pacman/pkg/qbittorrent-4.3.1-1-x86_64.pkg.tar.zst is corrupted (invalid or corrupted package (PGP signature)).
Do you want to delete it? [Y/n] n
error: failed to commit transaction (invalid or corrupted package)
Errors occurred, no packages were upgraded.
```

Решение:
1) удалить pacman gpg `rm -rf /etc/pacman.d/gnupg/`,
   очистить кэш pacman `pacman -Sc`
2) проинициализировать pacman `pacman-key --init`
3) `pacman-key --populate archlinux`
4) `pacman -S  archlinux-keyring`
5) `pacman-key --refresh-keys --keyserver hkp://pool.sks-keyservers.net`
6) `pacman -Syu`
