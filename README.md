![monologue](https://cdn.aixxe.net/projects/monologue/logo-transparent.png)

## Description

Laravel-based blog script currently running on [aixxe.net](aixxe.net). Rather basic and leaves a lot to be desired - mainly available here so I don't accidentally lose the source code.

## Installation

1. Edit configuration values in the `.env` file.
2. Edit `nav.blade.php` with various links.
3. Edit `footer.blade.php` quotes and social links.
4. Run `php artisan migrate` to create tables.
5. Run `gulp --production` to copy and version assets.

### Adding users

Currently users only exist to associate posts to authors. There are plans for commenting and a frontend for adding, editing and removing existing posts. Until then, you'll have to add posts and files manually.

```
$ php artisan tinker
>>> $user = new App\User;
>>> $user->name = "username";
>>> $user->display_name = "User Name";
>>> $user->email = "user@name.com";
>>> $user->password = bcrypt("password");
>>> $user->save()
=> true
```

Add tags to posts in the `post_tag` table.

### Creating posts

You can use the initial BBcode-esque markup defined in `config/parsers.php` or just regular HTML. Make sure to wrap all paragraphs in `[p][/p]` tags.

### Avatars, banners and uploads
* User avatars should be placed in `storage/app/public/avatars/` with a 32 character filename as a PNG.
* Banner location depends on the type. In all cases the file should be stored as a JPG and the filename should contain up to 32 characters.
    * Tag banners are stored in `storage/app/public/banners/users/`
    * Post banners are stored in `storage/app/public/banners/users/`
    * User banners are stored in `storage/app/public/banners/users/`
    * MOTD backgrounds are stored in `storage/app/public/banners/motd/`
* Uploads can reside anywhere but it's recommended to store any post related content in the `storage/app/public/content/{post id}/` folder so that it can easily be referenced in the future.