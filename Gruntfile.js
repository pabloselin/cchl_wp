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
				files: ['less/*.less'],
				tasks: ['clean','concat', 'less', 'version']
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
	//Default Tasks
	grunt.registerTask('default', [
			'clean',
			'concat',
			'less',
			'version'
		]);
}
