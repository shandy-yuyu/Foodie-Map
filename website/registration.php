<?php
require_once dirname(__FILE__) . "./head.php";
require_once dirname(__FILE__) . "./nav_bar.php";
?>
<body style="background-color: #c42a65;">
<div style="background-color: white; text-align: center">
	<form
		id="form"
		method="get"
		action="./registration_check.php"
	>
		<h3>Sign up</h3>
		<p><b>Please input your email</b></p>
			<input
				id="email"
				name="email"
				placeholder="Email"
				required=""
			>
		<p><b>Please input your admin<br>(input 1 for admin account)</b></p>
			<input
			id="admin"
			name="admin"
			type="input"
			placeholder="輸入 0 或 1"
			required=""
			>
		<p><b>Please input your password</b></p>
			<input
				id="password"
				name="password"
				type="password"
				required=""
			>
		<p><b>Write your password again</b></p>
			<input
				id="passwordConfirm"
				name="passwordConfirm"
				type="password"
				autocomplete="Off"
				required=""
			>
		<br>
			<button
				name="submit"
				value="Register"
				type="submit"
			><b>註冊</b></button>
	</form>
</div>
</body>

<script>
if(getUrlVars()['error']) {
	Swal.fire({
			icon: 'warning',
			text: decodeURIComponent(getUrlVars()['error']),
	});
}
if(getUrlVars()['success']) {
	Swal.fire({
			icon: 'success',
			text: decodeURIComponent(getUrlVars()['success']),
	});
}
function getUrlVars()
{
	var vars = [], hash;
	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	for(var i = 0; i < hashes.length; i++)
	{
		hash = hashes[i].split('=');
		vars.push(hash[0]);
		vars[hash[0]] = hash[1];
	}
	return vars;
}
</script>
