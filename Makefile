build:
	@docker build . -t simplebenchmark

run:
	@docker run --rm -it -v $(PWD):/app simplebenchmark phpbench run ForeachBench.php --report=aggregate

sh:
	@docker run --rm -it -v $(PWD):/app simplebenchmark sh