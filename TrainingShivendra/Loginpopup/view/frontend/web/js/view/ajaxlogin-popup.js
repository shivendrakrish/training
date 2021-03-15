define([
    'jquery',
    'ko',
    'Magento_Ui/js/form/form',
    'TrainingShivendra_Loginpopup/js/action/login',
    'Magento_Customer/js/customer-data',
    'TrainingShivendra_Loginpopup/js/ajaxlogin-popup',
    'mage/translate',
    'mage/url',
    'mage/validation'
], function ($, ko, Component, loginAction, customerData, ajaxLogin, $t, url) {
    'use strict';
 
    return Component.extend({
        registerUrl: window.ajaxLogin.customerRegisterUrl,
        forgotPasswordUrl: window.ajaxLogin.customerForgotPasswordUrl,
        autocomplete: window.ajaxLogin.autocomplete,
        modalWindow: null,
        isLoading: ko.observable(false),
 
        defaults: {
            template: 'TrainingShivendra_Loginpopup/ajaxlogin-popup'
        },
 
        /**
         * Init
         */
        initialize: function () {
            var self = this;
 
            this._super();
 
            url.setBaseUrl(window.ajaxLogin.baseUrl);
            loginAction.registerLoginCallback(function () {
                self.isLoading(false);
            });
        },
 
        /** Init popup login window */
        setAjaxModelElement: function (element) {
            if (ajaxLogin.modalWindow == null) {
                ajaxLogin.createPopUp(element);
            }
        },
 
        /** Is login form enabled for current customer */
        isActive: function () {
            var customer = customerData.get('customer');
 
            return customer() == false; //eslint-disable-line eqeqeq
        },
 
        /** Show login popup window */
        showModal: function () {
            if (this.modalWindow) {
                $(this.modalWindow).modal('openModal');
            }
        },
 
        /**
         * Provide login action
         *
         * @return {Boolean}
         */
        login: function (formUiElement, event) {
            var loginData = {},
                formElement = $(event.currentTarget),
                formDataArray = formElement.serializeArray();
 
            event.stopPropagation();
            event.preventDefault();
 
            formDataArray.forEach(function (entry) {
                loginData[entry.name] = entry.value;
            });
 
            if (formElement.validation() &&
                formElement.validation('isValid')
            ) {
                this.isLoading(true);
                loginAction(loginData);
            }
 
            return false;
        }
    });
});