module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		concat: {
			options: {
				separator: ';'
			},
			lumi_eob: {
				src: 'js_source/*.js',
				dest: 'js/lumi_eob.js'
			}
		},
		closureCompiler: {
			options: {
				compilerFile: 'c:\\Program Files (x86)\\Google Closure compiler\\compiler.jar'
			},
			lumi_eob: {
				src: 'js/lumi_eob.js',
				dest: 'js/lumi_eob.js'
			}
		}
	});

	// Load the plugin that provides the "uglify" task.
	grunt.loadNpmTasks('grunt-closure-tools');
	grunt.loadNpmTasks('grunt-contrib-concat');

	// Default task(s).
	grunt.registerTask('default', ['concat:lumi_eob', 'closureCompiler:lumi_eob']);

};