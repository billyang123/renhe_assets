exports.config =
  paths:
    watched: ['app/styles', 'app/scripts', 'app/assets']
    public: '_public' # export path
  files:

    javascripts:
      joinTo:#'javascripts/app.js' 
        'javascripts/app.js' : /^app/
        'javascripts/vendor.js' : /^bower_components/
      order:
        before: [
          'bower_components/jquery/dist/jquery.js'
          'bower_components/jquery-ujs/src/rails.js'
          'bower_components/amazeui/dist/amazeui.js'
        ]
      pluginHelpers: 'javascript/vendor.js'
    stylesheets:
      joinTo:'stylesheets/app.css'
      order:
        before: [
          
        ]

    templates:
       joinTo: 'javascripts/app.js'

  modules:
    nameCleaner: (path) ->
      path.replace(/^app\//, '') # root dir
  #   wrapper: (path, data) ->
  #     return 'require.define({#{path}, function (exports, require, module) {#{data}}});\n\n'
  # conventions:
  #   assets: /images(\/|\)/
  conventions:
    assets: /^app\/assets\//

 