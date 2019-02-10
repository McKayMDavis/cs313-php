args <- commandArgs(TRUE)

data <- read.csv("temp.csv")

library(rjson)
cat(toJSON(data))
# png(filename = "temp.png", width = 200, height = 200)
# plot(data$date_entered, data$amount)
# dev.off()