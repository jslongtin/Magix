<?php
require_once("action/IndexAction.php");

$action = new IndexAction();
$data = $action->execute();

require_once("partial/header.php");
?>

<div id="index">
	<h1> MAGIX </h1>
	<div class="ConnexionBox">
		<h2> Bienvennue! </h2>

		<form action="" method="post">
			<?php
			if ($data["connectionError"]) {
			?>
				<div class="error-message">
					<strong>Username et/ou Password INVALIDE</strong>
				</div>
			<?php
			}
			?>
			<div class="formLabel"><label for="Username"> Username : </label></div>
			<div class="formInput"><input type="text" name="Username" id="Username" /></div>
			<div class="formSeparator"></div>
			<div class="formLabel"><label for="Password"> Password : </label></div>
			<div class="formInput"><input type="password" name="Password" id="Password" /></div>
			<div class="formSeparator"></div>
			<button class="connexion" type="submit">Connexion</button>
		</form>
	</div>
	<div class="overwatch-loader">
    <svg class="overwatch-logo" viewbox="0 0 1000 1000">
        <svg xmlns="http://www.w3.org/2000/svg" width="600" height="600" x="200" y="210">
            <defs></defs>
            <path d="M296.704.004c-66.766.428-132.772 24.23-184.63 66.083l56.662 65.786c47.82-37.74 112.256-53.118 172.018-41.237 32.844 6.318 64.096 20.74 90.464 41.237l56.66-65.786C434.242 22.804 365.77-1.03 296.705.004z" color="#000" fill="#fa9c1e" overflow="visible"/>
            <path d="M93.628 82.253C33.924 138.343-1.082 219.877.026 302.123c.035 85.37 38.978 169.23 103.652 224.696 59.78 52.283 141.085 78.917 220.46 72.18 86.01-6.405 167.65-52.345 218.118-122.143 49.125-66.33 68.37-153.797 52.064-234.91-11.987-62.09-44.54-119.634-90.837-162.405l-56.662 65.786c45.657 43.034 70.586 106.557 65.886 169.224-2.056 31.05-11.074 61.69-26.314 88.96L370.92 291.974 312.66 166.39l-.088 190.18 116.695 112.926c-52.002 40.402-123.353 53.802-186.578 35.894-25.744-7.18-50.122-19.23-71.31-35.398L288.87 356.57c-.206-61.831.717-128.578 0-190.383L230.52 291.974 114.058 404.437c-35.53-62.024-36.38-142.21-2.182-204.927 10.69-20.092 24.84-38.428 41.257-54.182L96.47 79.542l-2.842 2.71z" color="#000" fill="#fff" overflow="visible"/>
      </svg>
    </svg>
    <svg class="circularCW" viewbox="0 0 1000 1000">
        <circle class="path" cx="500" cy="500" r="355" stroke="#fa9c1e"  fill="none" />
    </svg>
    <svg class="circularCCW" viewbox="0 0 1000 1000" style="animation-duration: 1.5s">
        <circle class="path2" cx="500" cy="500" r="355" stroke="#fa9c1e" fill="none" />
    </svg>
    <svg class="circularCW" viewbox="0 0 1000 1000">
        <circle class="path3" cx="500" cy="500" r="355" stroke="#fa9c1e" fill="none" />
    </svg>
      <svg class="circularCW" viewbox="0 0 1000 1000">
        <circle class="path4" cx="500" cy="500" r="355" stroke="#fa9c1e" fill="none" />
    </svg>
    <svg class="circularCW" viewbox="0 0 1000 1000">
        <circle class="path5" cx="500" cy="500" r="420" stroke="#fff" fill="none" />
    </svg>
      <svg class="circularCW" viewbox="0 0 1000 1000">
        <circle class="path6" cx="500" cy="500" r="420" stroke="#fff" fill="none" />
    </svg>
      <svg class="circularCCW" viewbox="0 0 1000 1000">
        <circle class="path7" cx="500" cy="500" r="420" stroke="#fff" fill="none" />
    </svg>
      <svg class="circularCCW" viewbox="0 0 1000 1000" style="animation-timing-function: ease-in-out">
        <circle class="path8" cx="500" cy="500" r="420" stroke="#fff" fill="none" />
    </svg>
</div>
</div>

<?php
require_once("partial/footer.php");
