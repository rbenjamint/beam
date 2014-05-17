// Want to se live-reload?
// http://feedback.livereload.com/knowledgebase/articles/86242-how-do-i-install-and-use-the-browser-extensions-

module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		// Task
		watch: {

			"css-pbforms": {

				files: 'source/css/**/**/*.scss',
				tasks: ['sass'],
				options: {
					livereload: false
				}
			}
		},

		// Task
		sass: {

			dist: {								// Target
				options: {						// Target options
					style: 'expanded'
				},
				files: {
					'public/static/css/main.css'	: 'source/css/main.scss'
				}
			}
		}

	});

	// grunt.loadNpmTasks('grunt-neuter');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-sass');
	// grunt.loadNpmTasks('grunt-handlebars-compiler');

	// Default task(s).
	grunt.registerTask('default', ['sass']);
	grunt.registerTask('sass-pbforms', ['sass']);

};
