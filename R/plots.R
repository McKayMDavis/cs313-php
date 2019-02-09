data <- read.csv("../web/prove_05/temp.csv")

png(filename = "../web/prove_05/temp.png", width = 500, height = 500)
plot(data$date_entered, data$amount)
dev.off()