![image](https://github.com/thewhyse/elevar-da-microsite/blob/master/wp-content/themes/conall-child/images/github//theagency-logo-242x116.png)

# Elevar DA Microsite Local Development Environment Set-up

[![N|Solid](https://cldup.com/dTxpPi9lDf.thumb.png)](https://nodesource.com/products/nsolid)
[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

Following is a tutorial on how to set-up a local environment for development and building the Elevar Therapeutics DA WordPress Microsite.

Dependencies:

- [Apache](https://httpd.apache.org/download.cgi)
- [PHP](https://www.php.net/downloads.php) v. 7.4
- [MySQL](https://dev.mysql.com/downloads/mysql/) Community Database Server
- [PhpMyAdmin](https://www.phpmyadmin.net/) MySQL administration tool
- [Git](https://git-scm.com/downloads) installed & [GitHub]() Account
- [NPM/NodeJS](https://www.npmjs.com/package/npm) v.18.17.0
- Terminal/Command-line access
- Source-code Editor ( [VS Code](https://code.visualstudio.com/), [Sublime](https://www.sublimetext.com/3), [Brackets](https://brackets.io/), [Phoenix Online](https://phcode.dev/), etc. )

## Appendix

[1. Git Clone](#1-git-clone)
[2. Set-up Database](#2-setup-database)
[3. Edit Local Files](#3-edit-local-files)
[4. Activate Plugins](#4-activate-plugins)
[5. Git Set-up](#5-git-setup)
[6. NPM](#6-npm-install)
[7. More Info](#7-more-info)

- - - -

## 1 Git Clone ##
#### Set-up local development environment ####

1. Login to **Pantheon Hosting** [Admin](https://pantheon.io/)

2. From the **menu** on the right-side, navigate to [SITES](#) and then from the list [ELEVAR DA MICROSITE](#)

> If you have not used **Pantheon Hosting** before, each site comes with three environments:
> **Dev, Test and Live**. Each environment runs a version of the site on its own container.
> By having separate **Dev, Test and Live** environments we can develop and test websites
> without impacting the **Live** environment's availability to the world.

3. Make sure you are on the **Dev** environment tab and that the **Development Mode** is set to **GIT**:

> ![image](https://github.com/thewhyse/elevar-da-microsite/blob/master/wp-content/themes/conall-child/images/github//pantheon-dev-tab.png)

4. Click [Clone with Git](#) button and copy the command line statement:

> ![image](https://github.com/thewhyse/elevar-da-microsite/blob/master/wp-content/themes/conall-child/images/github//gitclone-852x233.png)

5. Open your **Terminal**, navigate to the folder where you store your local dev projects and paste the `git clone` statement from above:

> ![image](https://github.com/thewhyse/elevar-da-microsite/blob/master/wp-content/themes/conall-child/images/github//git-clone-terminal.png)

6. Move to the newly created directory with the following command `cd elevar-da-microsite`

- - - -

## 2. Setup Database ##
#### Export Live Environment MySQL Database ####

1. Return to the **Pantheon Elevar Microsite** site dashboard, and navigate to the [Live](#) environment tab, and then select [Database/Files](#) from right-side menu:

> ![image](https://github.com/thewhyse/elevar-da-microsite/blob/master/wp-content/themes/conall-child/images/github//database-menu.png)

2. Once the database export is completed, click the top-most button next to your export to download the `database.sql.gz` file to your local computer:

> ![image](https://github.com/thewhyse/elevar-da-microsite/blob/master/wp-content/themes/conall-child/images/github//database-download.png)

3. Open **PHPMyAdmin** on your local machine, create a new blank **MySQL** database and import the newly downloaded `database.sql.gz` file:

> ![image](https://github.com/thewhyse/elevar-da-microsite/blob/master/wp-content/themes/conall-child/images/github//phpmyadmin.png)

4. Once the import has successfully finished, open **PHPMyAdmin**, navigate and browse to the  `wp-options` table data, and change `siteurl` and `home` to local domain `https://elevar-da-microsite.localdev` or the local development domain you would prefer to use:

> ![image](https://github.com/thewhyse/elevar-da-microsite/blob/master/wp-content/themes/conall-child/images/github//phpmyadmin-wp-options.png)

- - - -

## 3 Edit Local Files ##
#### Create Local WP Config Files ####

1. Return to the **Elevar Microsite** site folder `C:\Local Website Projects\elevar-da-microsite\` and copy the file `wp-config-local-sample.php` and rename it to `wp-config-local.php`. Open the file `wp-config-local.php` in your source code editor (all examples here are from [Visual Studio Code](https://code.visualstudio.com/),)

2. In your editor, change the following section to use the **MySQL** credentials you have set-up locally:

> ![image](https://github.com/thewhyse/elevar-da-microsite/blob/master/wp-content/themes/conall-child/images/github//wp-config-database.png)

3. And edit the following section to use the same development URL you used from **step 2.4.** above `https://elevar-da-microsite.localdev`:

> ![image](https://github.com/thewhyse/elevar-da-microsite/blob/master/wp-content/themes/conall-child/images/github//wp-config-siteurl.png)

- - - -

## 4 Activate Plugins ##
#### Activate Plugins & Set-up WordPress ####

If you have completed **steps 1-3** and there are no errors, you should be able to open your browser and navigate to the **WordPress** admin backend at `https://elevar-da-microsite.localdev/wp-admin`

(Login with the credentials you created when you received the **WordPress** new account invite email)

1. Once successfully logged in, go to the **WordPress Plugins** page and make sure the following plugins are activated (at a minimum):

- **Classic Editor**
- **Classic Widgets**
- **Edge CPT**
- **EdgeF Instagram Feed**
- **EdgeF Twitter Feed**
- **EXMAGE - WordPress Image Links**
- **Font Awesome**
- **Ultimate Addons for WPBakery Page Builder**
- **WPBakery Page Builder**

The remaining plugins are optional, but please do not delete or remove any plugins. Despite it not being standard best-practice, all plugins are under source control at the [git repository](https://github.com/thewhyse/elevar-da-microsite) for ease of set-up. If you remove any plugins, and then subsequently push other code changes, the plugins will also be removed on the Pantheon Development and Live site environments.

2. Be sure the following **WordPress** theme is active:

- **Conall Child Theme**

3. Go to the menu item [Settings](#) -> [Permalinks](#) and be sure the **Post Name** option is selected:

> ![image](https://github.com/thewhyse/elevar-da-microsite/blob/master/wp-content/themes/conall-child/images/github//wp-permalinks.png)

- - - -

## 5 Git Setup ##
#### GitHub Remote Repository Setup ####

1. Return to the command line terminal and you should still be in the project root folder `C:\Local Website Projects\elevar-da-microsite\`

2. Add the GitHub remote by entering the following command in your terminal: `git remote add github git@github.com:thewhyse/elevar-da-microsite.git`

3. To confirm, enter `git remote -v`. For the remote named `origin` you should see `fetch` and `push` addresses and for the new  remote named `github` you should also see `fetch` and `push` addresses as below:
```sh
github  git@github.com:thewhyse/elevar-da-microsite.git (fetch)
github  git@github.com:thewhyse/elevar-da-microsite.git (push)
origin  ssh://codeserver.dev.d702b8a7-37f6-4836-acb2-11a15893b53c@codeserver.dev.d702b8a7-37f6-4836-acb2-11a15893b53c.drush.in:2222/~/repository.git (fetch)
origin  ssh://codeserver.dev.d702b8a7-37f6-4836-acb2-11a15893b53c@codeserver.dev.d702b8a7-37f6-4836-acb2-11a15893b53c.drush.in:2222/~/repository.git (push)
```

We are now going to quickly configure git to automatically push all code changes to both Pantheon and GitHub repositories to keep them in sync.

4. Using your source code editor, open the file `C:\Local Website Projects\elevar-da-microsite\.git\config` (it does not have an extension for Windows/Linux). And under the `[remote "origin"]` section, add the new github repository information:

###### **AFTER AROUND LINE 8:** ######
```sh
	url = ssh://codeserver.dev.d702b8a7-37f6-4836-acb2-11a15893b53c@codeserver.dev.d702b8a7-37f6-4836-acb2-11a15893b53c.drush.in:2222/~/repository.git
```

###### **ADD THE ADDITIONAL GITHUB REPOSITORY:** ######
```sh
url = git@github.com:thewhyse/elevar-da-microsite.git
```

5. Now when you run `git remote -v` you should see five addresses returned as below:
```sh
github  git@github.com:thewhyse/elevar-da-microsite.git (fetch)
github  git@github.com:thewhyse/elevar-da-microsite.git (push)
origin  ssh://codeserver.dev.d702b8a7-37f6-4836-acb2-11a15893b53c@codeserver.dev.d702b8a7-37f6-4836-acb2-11a15893b53c.drush.in:2222/~/repository.git (fetch)
origin  ssh://codeserver.dev.d702b8a7-37f6-4836-acb2-11a15893b53c@codeserver.dev.d702b8a7-37f6-4836-acb2-11a15893b53c.drush.in:2222/~/repository.git (push)
origin  git@github.com:thewhyse/elevar-da-microsite.git (push)
```
> When doing a `git push -u origin master` code push, both the Pantheon and GitHub repositories will
> automatically be updated. But by having them as separate remotes, they can be pushed to individually
> in case there is an issue, or if one of the remotes fails during a push, etc.

- - - -

## 6 NPM Install ##
#### NPM Install ####

##### **NodeJS v.18.17.0** #####
##### **NPM v.9.8.1** #####

1. Using Terminal, go to the local environment theme folder `elevar-da-microsite\wp-content\themes\conall-child` and run the following:

###### **Global NPM Packages:** ######

```
npm install -g autoprefixer node-sass sass gulp-sass
```

######  **Project NPM Packages:** ######

```sh
npm install
```

2. NPM Scripts for development:

    a. `npm run watch`
    b. `gulp build --prod` (just prior to `git push`)

- - - -

## 7 More Info ##

#### And What NOT To Do... ####

* Every `git push` to the `master` branch will automatically be deployed to both **GitHub** and the **Pantheon** development server at https://dev-elevar-da-microsite.pantheonsite.io/

* **Do NOT** use **SFTP/FTP** to change server files or directory structure

* **Do NOT** Edit files directly on **GitHub**

Reach out to me anytime on **Microsoft Teams** or [email](mailto:bmead@mjhlifesciences.com)


## Tutorial Author

- [billiemead @GitHub](https://www.github.com/billiemead)


## 🔗 Links

[![githib](https://img.shields.io/badge/github-000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/thewhyse/elevar-da-microsite)

[![wpengine](https://img.shields.io/badge/wpengine-0ECAD4?style=for-the-badge&logo=wpengine&logoColor=white)](https://wpengine.com/)