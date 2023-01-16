
# Baby product website
3rd year Cloudbase e-commerce project website.

Using the XAMPP for server and database management.

# For Collaborators
- The <code>test.php</code> is the <strong>template</strong> using for faster and easily webapage creation. <strong>Copy and rename </strong> it and use the Bootstrap 5.3 for creation.
- Use the <code>home.php</code> for main webpage when the user logged in. It will be used for the main page
- For javascript and CSS. Put the bootstrap CSS and JS inside on ``<head></head>``  while the custom JS, place it before the ``</body>`` tag. Follow the format code below.

```html
<!DOCTYPE html>
<html>
	<head>
		Place here the CSS & JS bootstrap and the Custom CSS like
		<!-- Bootstrap -->
		<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
		<script src="js/bootstrap/bootstrap.bundle.min.js"></script>
		<link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

		<!-- css & js-->

		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
		... some code

		Custom JS goes here (must be before the </body> tag)
		<script src="js/main.js"></script>
		<script src="js/changeTheme.js"></script>
	</body>
</html>
```

To add pages, <strong>do not put it in any directory</strong>, just create a new php file under the root (baby-product-website) folder.

If you want to pull the repo, just create a **pull request**

#### Frameworks used
 - Node-js
 - Bootstrap 5.3
 - XAMPP (Php, MariaDB)

# Bootstrap 5.3
Get bootstrap 5.3 here to have a same version

https://getbootstrap.com/docs/5.3/getting-started/download/
