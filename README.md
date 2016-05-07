# myMailSubscriber
When we are maintain and sending mail list from wordpress mymail https://mymail.newsletter-plugin.com/ is really good plugin but it's lack of good api to add and move subscribers into deferance list. I happen to write this small post api to fix this and decided to open source under GNU/GPL

## How to use this
### Add New Subscriber to list
```html
<form method="post" action="/wp-admin/admin-post.php?action=add_subscriber_to_list">
<input type="text" name="firstname" />
<input type="text" name="lastname" />
<input type="text" name="email" />
<input type="text" name="list" />
<input type="submit" value="submit" />
</form>
```
### Add New Subscriber to list or move existing subscriber to new list
```html
<form method="post" action="/wp-admin/admin-post.php?action=change_subscriber_list">
<input type="text" name="firstname" />
<input type="text" name="lastname" />
<input type="text" name="email" />
<input type="text" name="list" />
<input type="submit" value="submit" />
</form>
```
