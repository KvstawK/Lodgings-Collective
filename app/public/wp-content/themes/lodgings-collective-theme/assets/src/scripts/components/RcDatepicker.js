class RcDatepicker {
	constructor(id) {
		this.datepickerId = id;
		if (this.datepickerId === null) {
			return;
		}

		this.monthLabels = [
			'January',
			'February',
			'March',
			'April',
			'May',
			'June',
			'July',
			'August',
			'September',
			'October',
			'November',
			'December',
		];

		this.comboboxNode =
			this.datepickerId.querySelector('input[type="text"]');
		this.dialogNode = this.datepickerId.querySelector('[role="dialog"]');
		this.monthYearNode = this.dialogNode.querySelector('.month-year');
		this.prevMonthNode = this.dialogNode.querySelector('.prev-month');
		this.nextMonthNode = this.dialogNode.querySelector('.next-month');
		this.tbodyNode = this.dialogNode.querySelector(
			'table.lc-datepicker-table-dates tbody'
		);

		this.lastRowNode = null;
		this.days = [];

		this.focusDay = new Date();
		this.selectedDay = new Date(0, 0, 1);

		this.createGridOfDays();
		this.events();
	}

	events() {
		this.comboboxNode.addEventListener('click', () =>
			this.onComboboxClick()
		);
		this.comboboxNode.addEventListener('keydown', () =>
			this.onComboboxKeyDown()
		);
		this.prevMonthNode.addEventListener('click', () =>
			this.onPreviousMonthButton()
		);
		this.prevMonthNode.addEventListener('keydown', () =>
			this.onPreviousMonthButton()
		);
		this.nextMonthNode.addEventListener('click', () =>
			this.onNextMonthButton()
		);
		this.nextMonthNode.addEventListener('keydown', () =>
			this.onNextMonthButton()
		);
		document.body.addEventListener('click', (e) =>
			this.clickOnBackground(e)
		);
	}

	createGridOfDays() {
		this.tbodyNode.innerHTML = '';
		for (let i = 0; i < 6; i++) {
			const row = this.tbodyNode.insertRow(i);
			this.lastRowNode = row;
			for (let j = 0; j < 7; j++) {
				const cell = document.createElement('td');

				cell.addEventListener('click', this.onDayClick.bind(this));
				cell.addEventListener('keydown', this.onDayKeyDown.bind(this));

				row.appendChild(cell);
				this.days.push(cell);
			}
		}

		this.updateGrid();
		this.close(false);
	}

	isSameDay(day1, day2) {
		return (
			day1.getFullYear() == day2.getFullYear() &&
			day1.getMonth() == day2.getMonth() &&
			day1.getDate() == day2.getDate()
		);
	}

	isNotSameMonth(day1, day2) {
		return (
			day1.getFullYear() != day2.getFullYear() ||
			day1.getMonth() != day2.getMonth()
		);
	}

	updateGrid() {
		let i, flag;
		const fd = this.focusDay;

		this.monthYearNode.textContent =
			this.monthLabels[fd.getMonth()] + ' ' + [fd.getFullYear()];

		const firstDayOfMonth = new Date(fd.getFullYear(), fd.getMonth(), 1);
		const dayOfWeek = firstDayOfMonth.getDay();

		firstDayOfMonth.setDate(firstDayOfMonth.getDate() - dayOfWeek);

		const d = new Date(firstDayOfMonth);

		for (i = 0; i < this.days.length; i++) {
			flag = d.getMonth() != fd.getMonth();
			this.updateDate(
				this.days[i],
				flag,
				d,
				this.isSameDay(d, this.selectedDay)
			);
			d.setDate(d.getDate() + 1);

			// Hide last row if all disabled dates
			if (i === 35) {
				if (flag) {
					this.lastRowNode.style.visibility = 'hidden';
					this.tbodyNode.style.height = 260 + 'px';
				} else {
					this.lastRowNode.style.visibility = 'visible';
					this.tbodyNode.style.height = 215 + 'px';
				}
			}
		}
	}

	setFocusDay(flag) {
		if (typeof flag !== 'boolean') {
			flag = true;
		}

		const fd = this.focusDay;
		const getDayFromDataDateAttribute = this.getDayFromDataDateAttribute;

		function checkDay(domNode) {
			const d = getDayFromDataDateAttribute(domNode);

			if (this.isSameDay(d, fd)) {
				if (flag) {
					domNode.focus();
				}
			}
		}

		this.days.forEach(checkDay.bind(this));
	}

	open() {
		this.dialogNode.style.display = 'block';
		this.dialogNode.style.zIndex = 2;

		this.comboboxNode.setAttribute('aria-expanded', 'true');
		this.getDateFromCombobox();
		this.updateGrid();
	}

	isOpen() {
		return window.getComputedStyle(this.dialogNode).display !== 'none';
	}

	close(flag) {
		if (typeof flag !== 'boolean') {
			// Default is to move focus to combobox
			flag = true;
		}

		this.dialogNode.style.display = 'none';
		this.comboboxNode.setAttribute('aria-expanded', 'false');

		if (flag) {
			this.comboboxNode.focus();
		}
	}

	onNextMonthButton() {
		let flag = false;

		switch (event.type) {
			case 'keydown':
				switch (event.key) {
					case 'Esc':
					case 'Escape':
						this.close();
						flag = true;
						break;

					case 'Enter':
						this.moveToNextMonth();
						this.setFocusDay(false);
						flag = true;
						break;
				}

				break;

			case 'click':
				this.moveToNextMonth();
				this.setFocusDay(false);
				break;

			default:
				break;
		}

		if (flag) {
			event.stopPropagation();
			event.preventDefault();
		}
	}

	onPreviousMonthButton() {
		let flag = false;

		switch (event.type) {
			case 'keydown':
				switch (event.key) {
					case 'Esc':
					case 'Escape':
						this.close();
						flag = true;
						break;

					case 'Enter':
						this.moveToPreviousMonth();
						this.setFocusDay(false);
						flag = true;
						break;
				}

				break;

			case 'click':
				this.moveToPreviousMonth();
				this.setFocusDay(false);
				flag = true;
				break;

			default:
				break;
		}

		if (flag) {
			event.stopPropagation();
			event.preventDefault();
		}
	}

	moveFocusToDay(day) {
		const d = this.focusDay;

		this.focusDay = day;

		if (d.getMonth() != this.focusDay.getMonth()) {
			this.updateGrid();
		}
		this.setFocusDay();
	}

	moveToNextMonth() {
		this.focusDay.setMonth(this.focusDay.getMonth() + 1);
		this.updateGrid();
	}

	moveToPreviousMonth() {
		this.focusDay.setMonth(this.focusDay.getMonth() - 1);
		this.updateGrid();
	}

	moveFocusToNextDay() {
		const d = new Date(this.focusDay);
		d.setDate(d.getDate() + 1);
		this.moveFocusToDay(d);
	}

	moveFocusToNextWeek() {
		const d = new Date(this.focusDay);
		d.setDate(d.getDate() + 7);
		this.moveFocusToDay(d);
	}

	moveFocusToPreviousDay() {
		const d = new Date(this.focusDay);
		d.setDate(d.getDate() - 1);
		this.moveFocusToDay(d);
	}

	moveFocusToPreviousWeek() {
		const d = new Date(this.focusDay);
		d.setDate(d.getDate() - 7);
		this.moveFocusToDay(d);
	}

	moveFocusToFirstDayOfWeek() {
		const d = new Date(this.focusDay);
		d.setDate(d.getDate() - d.getDay());
		this.moveFocusToDay(d);
	}

	moveFocusToLastDayOfWeek() {
		const d = new Date(this.focusDay);
		d.setDate(d.getDate() + (6 - d.getDay()));
		this.moveFocusToDay(d);
	}

	isDayDisabled(domNode) {
		return domNode.classList.contains('disabled');
	}

	getDayFromDataDateAttribute(domNode) {
		const parts = domNode.getAttribute('data-date').split('-');
		return new Date(parts[0], parseInt(parts[1]) - 1, parts[2]);
	}

	updateDate(domNode, disable, day, selected) {
		let d = day.getDate().toString();
		if (day.getDate() <= 9) {
			d = '0' + d;
		}

		let m = day.getMonth() + 1;
		if (day.getMonth() < 9) {
			m = '0' + m;
		}

		domNode.setAttribute('tabindex', '0');
		domNode.removeAttribute('aria-selected');
		domNode.setAttribute(
			'data-date',
			day.getFullYear() + '-' + m + '-' + d
		);

		if (disable) {
			domNode.classList.add('disabled');
			domNode.setAttribute('tabindex', '-1');
			domNode.textContent = '';
		} else {
			domNode.classList.remove('disabled');
			domNode.textContent = day.getDate();
			if (selected) {
				domNode.setAttribute('aria-selected', 'true');
				domNode.classList.add('active');
				// domNode.setAttribute('tabindex', '0');
			} else {
				domNode.classList.remove('active');
			}
		}
	}

	updateSelected(domNode) {
		for (let i = 0; i < this.days.length; i++) {
			const day = this.days[i];
			if (day === domNode) {
				// day.classList.add('active')
				day.setAttribute('aria-selected', 'true');
			} else {
				// day.classList.remove('active')
				day.removeAttribute('aria-selected');
			}
		}
	}

	onDayKeyDown(event) {
		let flag = false;

		switch (event.key) {
			case 'Esc':
			case 'Escape':
				this.close();
				break;

			case ' ':
				this.updateSelected(event.currentTarget);
				this.setComboboxDate(event.currentTarget);
				flag = true;
				break;

			case 'Enter':
				this.setComboboxDate(event.currentTarget);
				this.close();
				break;

			case 'Right':
			case 'ArrowRight':
				this.moveFocusToNextDay();
				flag = true;
				break;

			case 'Left':
			case 'ArrowLeft':
				this.moveFocusToPreviousDay();
				flag = true;
				break;

			case 'Down':
			case 'ArrowDown':
				this.moveFocusToNextWeek();
				flag = true;
				break;

			case 'Up':
			case 'ArrowUp':
				this.moveFocusToPreviousWeek();
				flag = true;
				break;

			case 'Home':
				this.moveFocusToFirstDayOfWeek();
				flag = true;
				break;

			case 'End':
				this.moveFocusToLastDayOfWeek();
				flag = true;
				break;
		}

		if (flag) {
			event.stopPropagation();
			event.preventDefault();
		}
	}

	onDayClick(event) {
		if (!this.isDayDisabled(event.currentTarget)) {
			this.setComboboxDate(event.currentTarget);
			this.close();
		}

		event.stopPropagation();
		event.preventDefault();
	}

	onDayFocus() {
		this.setMessage(this.messageCursorKeys);
	}

	setComboboxDate(domNode) {
		let d = this.focusDay;

		if (domNode) {
			d = this.getDayFromDataDateAttribute(domNode);
		}

		this.comboboxNode.value =
			d.getMonth() + 1 + '/' + d.getDate() + '/' + d.getFullYear();
	}

	getDateFromCombobox() {
		const parts = this.comboboxNode.value.split('/');

		if (
			parts.length === 3 &&
			Number.isInteger(parseInt(parts[0])) &&
			Number.isInteger(parseInt(parts[1])) &&
			Number.isInteger(parseInt(parts[2]))
		) {
			this.focusDay = new Date(
				parseInt(parts[2]),
				parseInt(parts[0]) - 1,
				parseInt(parts[1])
			);
			this.selectedDay = new Date(this.focusDay);
		} else {
			// If not a valid date (MM/DD/YY) initialize with todays date
			this.focusDay = new Date();
			this.selectedDay = new Date(0, 0, 1);
		}
	}

	onComboboxKeyDown() {
		let flag = false;

		switch (event.key) {
			case 'Enter':
				// case 'ArrowDown':
				this.open();
				this.setFocusDay();
				flag = true;
				break;

			// case 'Esc':
			case 'Escape':
				if (this.isOpen()) {
					this.close(false);
				} else {
					this.comboboxNode.value = '';
				}
				this.option = null;
				flag = true;
				break;

			default:
				break;
		}

		if (flag) {
			event.stopPropagation();
			event.preventDefault();
		}
	}

	onComboboxClick() {
		if (this.isOpen()) {
			this.close(false);
		} else {
			this.open();
		}

		event.stopPropagation();
		event.preventDefault();
	}

	clickOnBackground(e) {
		if (
			!this.comboboxNode.contains(e.target) &&
			!this.dialogNode.contains(e.target)
		) {
			if (this.isOpen()) {
				this.close(false);
				e.stopPropagation();
				e.preventDefault();
			}
		}
	}
}

export default RcDatepicker;
