args <- commandArgs(TRUE)

library(rjson)
cat(toJSON(list(1, 2, 3)))