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
					//'css/style-cchl.css':'less/main.less',
					'css/camara.css':'less/camara-main.less',
					'css/legacy.css': 'less/oldless/main.less'
					//'css/interior-cchl.css':'less/bs-interior/bs-interior.less'
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
				proxy: 'http://camara.dev'
			}
		},
		version: {
			assets: {
				options: {
					rename: true
				},
				files: {
					'inc/scripts.php': ['css/camara.css', 'css/legacy.css', 'js/camara.min.js']
				}
			}
		},
		clean: {
			dist: [
			'css/legacy.*.css',
			'css/camara.*.css',
			'js/camara.*.min.js'
			]
		},
		concat: {
			options: {
					separator: ';'
			},
			basic: {
				src: [
					'bower_components/galleria/src/galleria.js',
					'bower_components/bootstrap/js/dropdown.js',
					'bower_components/bootstrap/js/collapse.js',
					'bower_components/bootstrap/js/transition.js',
					'js/src/lib/imagesloaded.min.js',					
					'bower_components/masonry/dist/masonry.pkgd.js',
          'js/src/lib/jquery.cycle.all.js',
          //'js/src/lib/jquery.cycle2.js',
					'js/src/lib/readmore.min.js',
					'js/src/cchl-ajax.js',
					'js/src/cchl-main.js',
					'js/src/cchl-filsa.js'
					],
				dest: 'js/camara.js'
				},
		},
		uglify: {
			options: {
				mangle: false
			},
			scripts: {
				files: {
					'js/camara.min.js': ['js/camara.js']
				}
			}
		},
		image: {
			dynamic: {
				files: [{
				  expand: true,
				  cwd: 'oldimg/',
				  src: ['**/*.{png,jpg,gif,svg}'],
				  dest: 'img/'
				}]
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
	grunt.loadNpmTasks('grunt-image');
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
