INSERT INTO user_type (user_type) VALUES
  ('admin')
, ('user');

INSERT INTO users(username, password, user_type, date_entered, last_update) VALUES
  ('admin', '$2y$10$3FZpoV4sbTw5cmtF1kwDzurIuqdErxxzpDHZhj975UkBzxuOWMOYK
', 1, '2018-01-01', 1);

INSERT INTO goal(goal_expense, goal_revenue, goal_profits, year, date_entered, last_update) VALUES
  (100000, 300000, 200000, 2018, '2018-01-01', 1);

INSERT INTO expense(description, vendor, amount, year, date_entered, last_update, goal_id) VALUES
  ('An expense', 'Target', 10, 2018, '2018-01-14', 1, 1);

INSERT INTO revenue(description, client, amount, year, date_entered, last_update, goal_id) VALUES
  ('A revenue', 'Larry', 2000, 2018, '2018-01-18', 1, 1);