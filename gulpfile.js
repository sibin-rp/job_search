const elixir = require('laravel-elixir');
require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.sourcemaps = false;
elixir(mix => {
    mix.sass('app.scss')
    mix.sass('admin/admin.scss','public/css/admin/admin.css');
    mix.scripts([
            './node_modules/jquery/dist/jquery.min.js',
            './node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
            './node_modules/bootstrap-slider/dist/bootstrap-slider.min.js',
            './node_modules/owl.carousel/dist/owl.carousel.min.js',
            './node_modules/moment/moment.js',
            './node_modules/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
            './node_modules/parsleyjs/dist/parsley.js',
            './node_modules/toastr/build/toastr.min.js',
            './node_modules/select2/dist/js/select2.min.js',
            './node_modules/dropzone/dist/min/dropzone.min.js',
            './node_modules/smooth-scroll/dist/js/smooth-scroll.min.js',
            'main.js'
        ],
        'public/js/main.js');
    mix.scripts([
      './node_modules/vue/dist/vue.min.js'
    ],'public/js/vue.min.js');
    mix.scripts([
      './node_modules/underscore/underscore-min.js',
      'vue/main.js'
    ],'public/js/main-vue.min.js');
    // Admin Section
    mix.scripts([
        './node_modules/jquery/dist/jquery.min.js',
        './node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
        './node_modules/angular/angular.min.js',
        './node_modules/angular-resource/angular-resource.min.js',
        './node_modules/angular-ui-router/release/angular-ui-router.min.js',
        './node_modules/angular-ui-bootstrap/dist/ui-bootstrap-tpls.js',
        './node_modules/angular-smart-table/dist/smart-table.min.js',
        './node_modules/toastr/build/toastr.min.js',
        'admin/light-bootstrap-dashboard.js'
    ],
    'public/js/admin/admin.min.js');

    mix.scriptsIn(
    'resources/assets/js/admin/angular',
      'public/js/admin/admin-angular.min.js'
    );
    // mix.copy('./node_modules/bootstrap-sass/assets/fonts/**/*', 'public/fonts');

  //mix.browserSync({
  //  proxy: 'job_search.dev',
  //})
});