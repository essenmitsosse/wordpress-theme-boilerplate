module.exports = function(grunt) {
	'use strict';
	// load all grunt tasks
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.initConfig({
		sass: {
			dist: {
				options: {
					style: 'nested'
				},
				files: {
					'style.css': 'assets/_scss/main.scss'
				}
			}
		},

		cssmin: {
			dist: {
				files: [{
					expand: true,
					cwd: '',
					src: ['*.css', '!*.min.css'],
					dest: '',
					ext: '.min.css'
				}]
			}
		},

		watch: {
			css: {
				files: [ 'assets/_scss/**/*.scss' ],
				tasks: [ 'sass' ],
			},
			cssmin: {
				files: ['*.css', '!*.min.css'],
				tasks: [ 'cssmin' ],
				options: {
					spawn: false,
					livereload: 35729
				},
			}
			// livereload: {
			//     files: ['*.html', '*.php', 'assets/images/**/*.{png,jpg,jpeg,gif,webp,svg}']
			// }
		},
	});

	// register task
	grunt.registerTask( 'default', [ 'sass', 'cssmin' ]);
	grunt.registerTask( 'auto', [ 'default', 'watch' ]);
	grunt.registerTask( 'css', [ 'sass', 'cssmin' ]);

};