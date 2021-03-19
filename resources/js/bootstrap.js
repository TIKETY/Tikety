window._ = require('lodash');

require("sweetalert");

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'eba69f3573e3b45c6931',
    cluster: 'mt1',
    encrypted: true
});

window.Echo.channel('events').listen('UserEvent', e => {
    console.log('Events has been received');
    console.log(e);
});

const searchClient = algoliasearch(
    '7MQG8RFYJL',
    'a884d1fc98522d19099d44bbc0b7ce91'
);

const autocomplete = instantsearch.connectors.connectAutocomplete(
    ({ indices, refine, widgetParams }, isFirstRendering) => {
        const { container, onSelectChange } = widgetParams;

        if (isFirstRendering) {
            container.html('<select id="ais-autocomplete"></select>');

            container.find('select').selectize({
                options: [],
                valueField: 'name',
                labelField: 'name',
                highlight: false,
                onType: refine,
                onBlur() {
                    refine(this.getValue());
                },
                score() {
                    return function() {
                        return 1;
                    };
                },
                onChange(value) {
                    onSelectChange(value);
                    refine(value);
                },
            });

            return;
        }

        const [select] = container.find('select');

        indices.forEach(index => {
            select.selectize.clearOptions();
            index.results.hits.forEach(h => select.selectize.addOption(h));
            select.selectize.refreshOptions(select.selectize.isOpen);
        });
    }
);

const search = instantsearch({
    indexName: 'demo_ecommerce',
    searchClient,
});

search.addWidgets([
    instantsearch.widgets.configure({
        hitsPerPage: 10,
    }),
    instantsearch.widgets.hits({
        container: '#hits',
        templates: {
            item: `
            <div>
                <header class="hit-name">
                {{#helpers.highlight}}{ "attribute": "name" }{{/helpers.highlight}}
                </header>
                <p class="hit-description">
                {{#helpers.highlight}}{ "attribute": "description" }{{/helpers.highlight}}
                </p>
            </div>
            `,
        },
    }),
]);

const suggestions = instantsearch({
    indexName: 'demo_ecommerce',
    searchClient,
});

suggestions.addWidgets([
    instantsearch.widgets.configure({
        hitsPerPage: 5,
    }),
    autocomplete({
        container: $('#autocomplete'),
        onSelectChange(value) {
            search.helper.setQuery(value).search();
        },
    }),
]);

suggestions.start();
search.start();