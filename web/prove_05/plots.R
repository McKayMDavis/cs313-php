data <- read.csv("temp.csv")

png(filename = "temp.png", width = 500, height = 500)
plot(data$date_entered, data$amount)
dev.off()