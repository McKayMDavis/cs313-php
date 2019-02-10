args <- commandArgs(TRUE)
tmp <- strsplit(args, " ")

a <- as.numeric(tmp[[1]][1])
b <- as.numeric(tmp[[2]][1])


output <- list(first_name="Finau")

library(rjson)
cat(toJSON(output))