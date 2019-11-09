const ironmassliteResponsiveMenu = (options = {}) => {

	const defaults = {
		wrapper: '.main-navigation',
		menu: '.menu',
		threshold: 640, // Minimal menu width,
		ironmassliteleMenuClass: 'ironmasslitele-menu',
		ironmassliteleMenuOpenClass: 'ironmasslitele-menu-open',
		ironmassliteleMenuToggleButtonClass: 'ironmasslitele-menu-toggle-button',
		toggleButtonTemplate: '<i class="ironmasslitele-menu-close fa fa-bars" aria-hidden="true"></i><i class="ironmasslitele-menu-open fa fa-times" aria-hidden="true"></i>'
	}
	options = Object.assign(defaults, options);

	const wrapper = options.wrapper.nodeType ?
		options.wrapper :
		document.querySelector(options.wrapper);

	const menu = options.menu.nodeType ?
		options.menu :
		document.querySelector(options.menu);

	let toggleButton,
		toggleButtonOpenBlock,
		toggleButtonCloseBlock,
		isIronmassliteleMenu,
		isIronmassliteleMenuOpen;

	// series

	const init = [
		addToggleButton,
		checkScreenWidth,
		addResizeHandler
	]

	if (wrapper && menu) {
		runSeries(init);
	}

	function addToggleButton() {
		toggleButton = document.createElement('button');

		toggleButton.innerHTML = options.toggleButtonTemplate.trim();
		toggleButton.className = options.ironmassliteleMenuToggleButtonClass;
		wrapper.insertBefore(toggleButton, wrapper.children[0]);

		toggleButtonOpenBlock = toggleButton.querySelector('.ironmasslitele-menu-open');
		toggleButtonCloseBlock = toggleButton.querySelector('.ironmasslitele-menu-close');

		toggleButton.addEventListener('click', ironmassliteleMenuToggle);
	}

	// menu switchers

	function switchToIronmassliteleMenu() {
		wrapper.classList.add(options.ironmassliteleMenuClass);
		toggleButton.style.display = "block";
		isIronmassliteleMenuOpen = false;
		hideMenu();
	}

	function switchToDesktopMenu() {
		wrapper.classList.remove(options.ironmassliteleMenuClass);
		toggleButton.style.display = "none";
		showMenu();
	}

	// ironmasslitele menu toggle

	function ironmassliteleMenuToggle() {
		if (isIronmassliteleMenuOpen) {
			hideMenu();
		} else {
			showMenu();
		}
		isIronmassliteleMenuOpen = !isIronmassliteleMenuOpen;
	}

	function hideMenu() {
		wrapper.classList.remove(options.ironmassliteleMenuOpenClass);
		menu.style.display = "none";
		toggleButtonOpenBlock.style.display = "none";
		toggleButtonCloseBlock.style.display = "block";
	}

	function showMenu() {
		wrapper.classList.add(options.ironmassliteleMenuOpenClass);
		menu.style.display = "block";
		toggleButtonOpenBlock.style.display = "block";
		toggleButtonCloseBlock.style.display = "none";
	}

	// resize helpers

	function checkScreenWidth() {
		let currentIronmassliteleMenuStatus = window.innerWidth < options.threshold ? true : false;

		if (isIronmassliteleMenu !== currentIronmassliteleMenuStatus) {
			isIronmassliteleMenu = currentIronmassliteleMenuStatus;
			isIronmassliteleMenu ? switchToIronmassliteleMenu() : switchToDesktopMenu();
		}
	}

	function addResizeHandler() {
		window.addEventListener('resize', resizeHandler);
	}

	function resizeHandler() {
		window.requestAnimationFrame(checkScreenWidth)
	}

	// general helpers

	function runSeries(functions) {
		functions.forEach(func => func());
	}
}