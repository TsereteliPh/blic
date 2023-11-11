"use strict";

function get_siblings(elem) {
	// for collecting siblings
	let siblings = [];
	// if no parent, return no sibling
	if (!elem.parentNode) {
		return siblings;
	}
	// first child of the parent node
	let sibling = elem.parentNode.firstChild;
	// collecting siblings
	while (sibling) {
		if (sibling.nodeType === 1 && sibling !== elem) {
			siblings.push(sibling);
		}
		sibling = sibling.nextSibling;
	}
	return siblings;
}

function slideToggle(elem) {
	if (elem.offsetHeight === 0) {
		elem.style.maxHeight = `${elem.scrollHeight}px`;
	} else {
		elem.style.maxHeight = 0;
	}
}

function setHeaderScrollClass() {
	const header = document.querySelector(".header");

	window.addEventListener("scroll", function () {
		if (window.scrollY >= header.offsetHeight) {
			header.classList.add("scroll");
		} else {
			header.classList.remove("scroll");
		}
	});
}

function setTelMask() {
	const phoneInputs = document.querySelectorAll("input[type='tel']");

	phoneInputs.forEach(input => {
		input.addEventListener("keydown", function (e) {
			input.value = phoneNumberFormatter(input.value);
		})

		input.addEventListener("focus", function (e) {
            if (!input.value) {
				input.value = '+';
			}
        })

		input.addEventListener("blur", function (e) {
            if (input.value === '+') {
                input.value = '';
            }
        })
	});

	function phoneNumberFormatter(value) {
		if (!value) return value;

		const phoneNumber = value.replace(/[^\d]/g, '');
		if (phoneNumber.length < 4) return '+' + phoneNumber;
		if (phoneNumber.length < 7) {
			return `+${phoneNumber.slice(0, 3)} ${phoneNumber.slice(3)}`;
		}

		return `+${phoneNumber.slice(0, 3)} ${phoneNumber.slice(3, 6)} ${phoneNumber.slice(6)}`;
	}
}

function sendForm() {
	document.querySelectorAll("form[name]").forEach(function (form) {
		form.addEventListener("submit", function (e) {
			e.preventDefault();
			const form = this;
			this.classList.add("loader");
			let formData = new FormData(form);
			const formName = form.name;
			const fileInput = form.querySelector("input[type=file]");

			formData.append("action", "send_mail");

			if (formName) {
				formData.append("form_name", formName);
			} else {
				return;
			}

			if (fileInput) {
				Array.from(fileInput.files).forEach((file, key) => {
					formData.append(key.toString(), file);
				});
			}

			const response = fetch(tsereteli_ajax.url, {
				method: "POST",
				body: formData,
			})
				.then((response) => response.text())
				.then((data) => {
					this.classList.remove("loader");
					Fancybox.close(true);
					form.reset();
					setTimeout(function () {
						Fancybox.show([
							{
								src: "#success",
								type: "inline",
							},
						]);
					}, 100);
				})
				.catch((error) => {
					console.error("Error:", error);
				});
		});
	});
}

function setFileName() {
	const fileInputs = document.querySelectorAll("input[type=file]");
	if (fileInputs) {
		fileInputs.forEach(function (input) {
			input.addEventListener("change", function (e) {
				e.target.nextElementSibling.textContent = e.target.files[0].name;
			});
		});
	}
}

function tabs() {
	const tabsLists = document.querySelectorAll(".js-tabs");
	if (tabsLists) {
		tabsLists.forEach(function (tabsList) {
			bindUIFunctions(tabsList);
		});
	}

	function bindUIFunctions(tabsList) {
		tabsList.addEventListener("click", function (e) {
			const tabItem = e.target.closest("li");
			if (tabItem.classList.contains("active")) {
				toggleMobileMenu(tabItem);
			}
			if (!tabItem.classList.contains("active") && e.target !== tabsList) {
				changeTab(tabItem);
			}
		});
	}

	function changeTab(tabItem) {
		const tabContainer = document.querySelector(
			"#" + tabItem.getAttribute("data-tab")
		);

		tabItem.classList.add("active");
		get_siblings(tabItem).forEach(function (tab) {
			tab.classList.remove("active");
		});

		tabContainer.classList.add("active");
		get_siblings(tabContainer).forEach(function (tab_container) {
			tab_container.classList.remove("active");
		});

		tabItem.parentNode.classList.remove("open");
	}

	function toggleMobileMenu(tabItem) {
		tabItem.parentNode.classList.toggle("open");
	}
}

//Ajax

function showMorePosts() {
	const show_more_btn = document.querySelector(".js-show-more");

	if (!show_more_btn) return;

	show_more_btn.addEventListener("click", function (e) {
		e.stopImmediatePropagation();
		const container = document.querySelector(".js-show-more-container");
		this.textContent = "Загрузка...";

		const response = fetch(tsereteli_ajax.url, {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded;charset=UTF-8",
			},
			body: new URLSearchParams({
				action: "load_more",
				query: posts,
				page: current_page,
			}),
		})
			.then((response) => response.text())
			.then((data) => {
				this.innerHTML = this.dataset.text;
				container.insertAdjacentHTML("beforeend", data);
				current_page++;
				if (current_page === max_pages) this.remove();
			})
			.catch((error) => {
				console.error("Error:", error);
			});
	});
}

document.addEventListener("DOMContentLoaded", function () {
	setHeaderScrollClass();

	setFileName();

	sendForm();

	setTelMask();

	tabs();

	showMorePosts();
});

//Fancybox

try {
	Fancybox.bind("[data-fancybox]", {
		animated: false,
	});

	Fancybox.bind('[data-src="#order-calc"]', {
		defaultDisplay: "block",
		dragToClose: false,
	});
} catch (error) {
	console.log(error);
}

//Swiper

//Слайдер blocks/rest

const restCarousel = document.querySelector(".rest__wrapper");

if (restCarousel) {
	let papersSwiper = new Swiper(restCarousel, {
		navigation: {
			nextEl: ".rest__next",
			prevEl: ".rest__prev",
		},
		breakpoints: {
			1440: {
				slidesPerView: 4,
				centeredSlides: false,
			},
			992: {
				slidesPerView: 3,
				centeredSlides: false,
			},
			769: {
				slidesPerView: 2,
				centeredSlides: false,
			},
			577: {
				centeredSlides: false,
			},
		},
		slidesPerView: "auto",
		centeredSlides: true,
		spaceBetween: 25,
	});
}

// Функционал шапки сайта

document.addEventListener("DOMContentLoaded", function(e) {
	const header = document.querySelector('.header');

	if (header) {
		const headerBurger = header.querySelector('.header__burger');
		const headerDrop = header.querySelector('.header__drop');

		const dropOpener = () => {
			header.classList.add('active');
			headerBurger.classList.add('active');
			headerDrop.style.maxHeight = headerDrop.scrollHeight + "px";
			document.body.style.overflow = 'hidden';
		}

		const dropCloser = () => {
			header.classList.remove('active');
			headerBurger.classList.remove('active');
			headerDrop.style.maxHeight = 0;
			document.body.style.overflow = 'visible';
		}

		headerBurger.addEventListener('click', function() {
			if (this.classList.contains('active')) {
				dropCloser();
			} else {
				dropOpener();
			}
		})
	}
})

//Функционал блока .accordion

let accordion = document.querySelector('.accordion');

if (accordion && accordion.classList.contains('accordion--full-size') && window.innerWidth >= 992) {
	accordion = false;
}

if (accordion) {
	const accordionBtns = accordion.querySelectorAll('.accordion__button');

	const accordionBtnsClose = () => {
		for (let btn of accordionBtns) {
			btn.classList.remove('active');
			btn.nextElementSibling.style.maxHeight = 0;
		}
	}

	accordionBtns.forEach(btn => {
		btn.addEventListener('click', function() {
			if (this.classList.contains('active')) {
				accordionBtnsClose();
			} else {
				accordionBtnsClose();
				this.classList.add('active');
				slideToggle(this.nextElementSibling);
			}
		})
	});
}

//Функционал отклика на вакансию

const jobBtns = document.querySelectorAll('.jobs__modal');

if (jobBtns) {
	jobBtns.forEach(btn => {
		btn.addEventListener('click', function() {
			const modal = document.querySelector(this.dataset.src);
			let modalInput = modal.querySelector('input[name=client_position]');
			modalInput.value = this.dataset.position;
		})
	});
}
