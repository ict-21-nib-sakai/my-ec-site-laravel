# 模擬的なECサイト
Laravel Framework の復習およびその成果物であり、備忘録です。
また Vagrant や Docker 部分に関しては個人的な備忘録です。独学によるものが大きく、最適な構築方法とは限りません。ご意見や改善案は issue に記載いただければ嬉しいです。

## あなたのパソコンに必要なもの
- [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
  - お使いのパソコンのOSに合うものをダウンロードし、インストールしてください。
- [Vagrant](https://www.vagrantup.com/downloads)
  - お使いのパソコンのOSに合うものをダウンロードし、インストールしてください。
- rsync コマンド
  - お使いのパソコンに合わせてインストールしてください。
  - 例えば Ubuntu での例。
```shell
$ sudo apt install rsync
```

### Vagrant プラグインのインストール
```shell
$ vagrant plugin install vagrant-vbguest
```

## 自動的に構築される環境
- Vagrant 仮想マシン
  - Docker コンテナ 
    - PHP 8.1 RC6 CLI
    - PHP 8.1 RC6 Apache
    - MySQL 8.0

## 起動方法
```shell
$ cd vm
$ vagrant up
```

## Webアプリケーションのトップページ
http://192.168.33.134/

## ホストOS側から、ゲストOS側へのファイル転送
```shell
$ cd vm
$ vagrant rsync-auto
```
### ⚠ ご注意 ⚠
- 実行しっぱなしで放置して、ターミナルは閉じないでください。
- ホスト → ゲストへの一方通行です。
- ホスト側が「正」となります。
- ホストOSのファイル変更を検知して、ゲストOS側に自動転送します。
- また、ホストOS側でファイルが削除されると、ゲストOS側も自動的に削除されます。

## ゲストOS側からホストOS側へのファイル転送
```shell
$ vagrant rsync-back
```
### ⚠ ご注意 ⚠
- `vagrant rsync-auto` と異なり、必要に応じて手動で実行するコマンドです。
  - 良くも悪くもコマンドが継続しません。
- ゲスト → ホストへの一方通行です。
- ゲスト側が「正」となります。
- よって、ゲストOS側でファイルが削除されていれば、ホストOS側のファイルも削除されます。
- 使用例として
  - composer でパッケージを追加した。
  - Laravel でマイグレーションファイルを作った・更新した。
  - などなど。なにかゲストOS側でファイルが作られたり、更新されたときに使用してください。

## 既知の不具合
- 初回 `vagrant up` コマンドで「マウントに失敗した」とメッセージが表示されます。
- これは、ゲスト OSである AlmaLinux 8 にホストOS側にくらべて、古いバージョンの VirtualBox Guest Additions がインストールされてしまっているようです。
- そのため、VirtualBox Guest Additions はゲストに `vagrant ssh` して 手動でインストールする必要あります。
- ダウンロードとインストールは下記を参照。(バージョン番号はホスト OS にインストールされている VirtualBox のバージョン番号に読み替えてください。)
  - https://download.virtualbox.org/virtualbox/6.1.28/ 内の VBoxGuestAdditions_6.1.28.iso

### ゲスト OS に VirtualBox Guest Additions インストールする方法
バージョン番号や Path は適宜読み替えてください。
```bash
$ cd vm
$ vagrant ssh
$ curl -L -O https://download.virtualbox.org/virtualbox/6.1.28/VBoxGuestAdditions_6.1.28.iso
$ sudo mkdir /media/iso
$ sudo mount -t iso9660 ~/VBoxGuestAdditions_6.1.28.iso /media/iso
$ cd /media/iso
$ sudo ./VBoxLinuxAdditions.run
```

## 参考書籍
### Vagrant
- インターネットの記事を参照して試行錯誤しました。

### Docker
- [さわって学ぶクラウドインフラ docker基礎からのコンテナ構築 ISBN 978-4-296-10642-4](https://www.nikkeibp.co.jp/atclpubmkt/book/20/279230/)

### Laravel
- [PHPフレームワーク Laravel入門 第2版](https://www.shuwasystem.co.jp/book/9784798060996.html)
- [PHPフレームワーク Laravel実践開発 ISBN 9784798059075](https://www.shuwasystem.co.jp/book/9784798059075.html)

書籍だけでなく、全般としてインターネットによる記事を多く参照し試行錯誤しました。