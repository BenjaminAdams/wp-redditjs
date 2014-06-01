wp-redditjs
==================

[wp-redditjs](https://github.com/BenjaminAdams/wp-redditjs) uses redditJS.com to create widgets to embed on your website.

The post widget will embed itself onto your Wordpress post and detect if it has been posted to reddit.

 If it has NOT been posted to reddit it will <a href="http://i.imgur.com/OLJjzkx.png" title="example" target='_blank'>show a link</a> to encourage the user to submit.

 If it has been posted, it will load a widget displaying that reddit post giving the user where they can upvote/comment that post.

[wp-redditjs](https://github.com/BenjaminAdams/wp-redditjs) will give you a chat box similar to facebook or disqus comment system.  This is excellent for websites that have their content submitted to reddit.  It will help increase reddit activity with more upvotes and comments and allow the user to freely navigate reddit.

## Instructions

If you are not using the Wordpress plugin, you can add this script tag on any website.

```<script src='//redditjs.com/post.js' </script>```
### Options

<table style='width:800px'>
<tr><th style='width:125px;'>Name</th><th>Description</th> <th>values</th> <th>Default</th></tr>
<tr><td>data-url</td><td>The URL you want to search in reddit to embed on your site.</td> <td>any url</td>  <td>current URL</td> </tr>
<tr><td>data-width</td><td>Width of the post widget.</td> <td>number</td> <td>500</td> </tr>
<tr><td>data-height</td><td>Height of the post widget.</td> <td>number</td> <td>500</td> </tr>
<tr><td>data-post-finder</td><td>If the URL has been submitted multiple times to reddit, it will display the most relevant post based on your setting.</td> <td>newest, mostUpvoted, mostComments</td> <td>mostComments</td> </tr>
<tr><td>data-theme</td><td>Change the theme</td> <td>light, dark <td>light</td> </tr>
<tr><td>data-show-submit</td><td>If we don't find a post on reddit, should we display a "submit to reddit" widget.</td> <td>true,false</td> <td>true</td> </tr>
</table>

### example with all options

```
<script src='//redditjs.com/post.js' data-url='http://www.techodrom.com/etc/star-trek-edges-closer-reality-tractor-beam-moves-object-using-nothing-power-ultrasound/' data-height='500' data-width='500' data-post-finder='newest' data-theme='dark' data-show-submit='true'  </script>
```

