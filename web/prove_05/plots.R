args <- commandArgs(TRUE)
cat("R Script in progress")
data <- read.csv("temp.csv")

png(filename = "temp.png", width = 200, height = 200)
plot(data$date_entered, data$amount)
dev.off()