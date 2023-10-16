[![Visitors](https://api.visitorbadge.io/api/visitors?path=https%3A%2F%2Fgithub.com%2Fcodersangam%2Ftechblog&label=REPO%20VISITORS&countColor=%23ff8a65&labelStyle=upper)](https://visitorbadge.io/status?path=https%3A%2F%2Fgithub.com%2Fcodersangam%2Ftechblog)
![](https://img.shields.io/badge/-laravel-grey?style=for-the-badge&logo=laravel)
![](https://badgen.net/github/stars/codersangam/techblog)
![](https://badgen.net/github/forks/codersangam/techblog)

# Installation

### Download zip file or directly open terminal and type
```yaml
git clone https://github.com/codersangam/techblog.git
```

### Open projects using IDE like `VS Code` or Others.
### In terminal enter below command to update dependencies:
Note: Install [`composer`](https://getcomposer.org/) If you have not installed in your system.
```yaml
composer update
```

### Create new `database` or `schema` using `mysql workbench` or others.
### In main project folder, find `.env.example` file & rename that file to `.env`

### Setup `database name`, `database user` and `database password` in `.env file`

### Migrate all tables to DB.
```yaml
php artisan migrate
```
### Type below command in terminal to generate key.
```yaml
php artisan key:generate
```

### After that, to symlink the images.
```yaml
php artisan storage:link
```

### Finally, to run project:
```yaml
php artisan serve
```

# Support
<a href="https://www.buymeacoffee.com/codersangam" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;" ></a>


# APIs

## New API Docs: https://app.theneo.io/purple-tech/techblog-api

- Main Url: https://your-domain.com/api or http://localhost:8000/api

- Users Panel Endpoint Urls (These Urls doesnot need any tokens)
    <br>
    <br>
    - `/posts` GET Request : Fetch all posts
    - `/tags` GET Request : Fetch all tags
    - `/categories` GET Request : Fetch all categories
    - `/counts` GET Request : Fetch total counts of users, posts, tags and categories.
    - `/register` POST Request To register new users/admins
    - `/login` POST Request : To login users/admins

<br/>
<br/>

- Admin Panel Endpoint Urls (These Urls need tokens to create/post/update/delete data)

    - `/add-tags` POST Request : To add new tags
    - `/update-tags` POST Request : To update tags
    - `/delete-tags/id` POST Request : To delete tags
    - `/add-categories` POST Request : To add new categories
    - `/update-categories` POST Request : To update categories
    - `/delete-categories/id` POST Request : To delete categories
    - `/user-posts` GET Request : To Fetch User Posts
    - `/add-posts` POST Request : To add new posts
    - `/update-posts` POST Request : To update posts
    - `/delete-posts/id` POST Request : To delete posts
    - `/logout` POST Request : To logout current user.
