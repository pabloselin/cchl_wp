module.exports = function(grunt) {
	//Project config
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		less: {
			dist: {
				options: {
					paths: ['css'],
					compress: true
				},
				files: {
					'css/style-cchl.css':'less/main.less'
				}
			}
		},
		watch: {
			less: {
				files: ['less/*.less', 'less/*/*.less'],
				tasks: ['less', 'version']
			},
			scripts: {
				files: ['js/src/*.js'],
				tasks: ['concat', 'version']
			}

		},
		browserSync: {
			dist: {
				bsFiles: {
					src: ['less/*.less',
						'less/*/*.less',
						'*.php',
						'parts/*.php']
					}
			},
			options: {
				watchTask: true,
				proxy: 'http://cchl.dev'
			}
		},
		version: {
			assets: {
				options: {
					rename: true
				},
				files: {
					'inc/scripts.php': ['css/style-cchl.css', 'js/cchl-scripts.js']
				}
			}
		},
		clean: {
			dist: [
			'css/style-cchl.*.css',
			'js/cchl-scripts.*.min.js'
			]
		},
		concat: {
			options: {
				separator: ';'
			},
			dist: {
				src: [
				'bower_components/galleria/src/galleria.js',
				'js/galleria-classic-theme/galleria.classic.js',
				'js/src/cchl-ajax.js',
				'js/src/cchl-main.js',
				'js/src/cchl-filsa.js'
				],
				dest: 'js/cchl-scripts.js'
			}
		}
	});
	//Load tasks plugins
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-wp-assets');
	grunt.loadNpmTasks('grunt-browser-sync');
	//Default Tasks
	grunt.registerTask('build', [
		'clean',
		'concat',
		'less',
		'version'
		]);
	grunt.registerTask('default',  [
		'browserSync',
		'watch'
		]);
}
