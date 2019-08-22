/* For creating entity */
var switchElement = document.querySelector('.checkbox-switch-tax');
var switchElement2 = document.querySelector('.checkbox-switch-click');
var switchElement3 = document.querySelector('.checkbox-switch-vip');
var switchElement4 = document.querySelector('.checkbox-switch-europe');
var switchElement5 = document.querySelector('.checkbox-attr-categories');
var switchElement6 = document.querySelector('.checkbox-public');

var options = {
	checked: false,
	size: 'small',
	onSwitchColor : '#394a59'
}
var switcher = new Switch(switchElement, options);
var switcher2 = new Switch(switchElement2, options);
var switcher3 = new Switch(switchElement3, options);
var switcher4 = new Switch(switchElement4, options);
var switcher5 = new Switch(switchElement5, options);
var switcher6 = new Switch(switchElement6, options);

/* For editing entity */
var switchElementEditing = document.querySelector('.checkbox-vip');
var switchElementEditing2 = document.querySelector('.checkbox-europe');
var switchElementEditing3 = document.querySelector('.checkbox-tax');
var switchElementEditing4 = document.querySelector('.checkbox-one-click');
var switchElementEditing5 = document.querySelector('.checkbox-attr-cats-edit');
var switchElementEditing6 = document.querySelector('.checkbox-published');

var optionsEditing = {
	size: 'small',
	onSwitchColor : '#394a59',
}

var switcher = new Switch(switchElementEditing, optionsEditing);
var switcher2 = new Switch(switchElementEditing2, optionsEditing);
var switcher3 = new Switch(switchElementEditing3, optionsEditing);
var switcher4 = new Switch(switchElementEditing4, optionsEditing);
var switcher5 = new Switch(switchElementEditing5, optionsEditing);
var switcher6 = new Switch(switchElementEditing6, optionsEditing);