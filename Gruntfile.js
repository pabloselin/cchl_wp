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
					'css/style-cchl.css':'less/main.less',
					'css/home-cchl.css':'less/bs-home/bs-home.less',
					'css/interior-cchl.css':'less/bs-interior/bs-interior.less'
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
					'inc/scripts.php': ['css/style-cchl.css', 'js/cchl-scripts.min.js', 'css/home-cchl.css', 'js/cchl-home.min.js', 'css/interior-cchl.css']
				}
			}
		},
		clean: {
			dist: [
			'css/style-cchl.*.css',
			'css/home-cchl.*.css',
			'css/interior-cchl.*.css',
			'js/cchl-scripts.*.min.js',
			'js/cchl-home.*.min.js',
			]
		},
		concat: {
			options: {
					separator: ';'
			},
			basic: {
				src: [
					'bower_components/galleria/src/galleria.js',
					'js/galleria-classic-theme/galleria.classic.js',
					'js/src/cchl-ajax.js',
					'js/src/cchl-main.js',
					'js/src/cchl-filsa.js'
					],
				dest: 'js/cchl-scripts.js'
				},
			home: {	
				src: [
						'bower_components/bootstrap/js/dropdown.js',
						'bower_components/bootstrap/js/collapse.js',
						'bower_components/bootstrap/js/transition.js',
						'bower_components/bootstrap/js/masonry.pkgd.js'
					],
				dest: 'js/cchl-home.js'
				}
		},
		uglify: {
			options: {
				mangle: false
			},
			scripts: {
				files: {
					'js/cchl-scripts.min.js': ['js/cchl-scripts.js'],
					'js/cchl-home.min.js': ['js/cchl-home.js']
				}
			}
		}
	});
	//Load tasks plugins
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-wp-assets');
	grunt.loadNpmTasks('grunt-browser-sync');
	//Default Tasks
	grunt.registerTask('build', [
		'clean',
		'concat',
		'uglify',
		'less',
		'version'
		]);
	grunt.registerTask('default',  [
		'browserSync',
		'watch'
		]);
}
