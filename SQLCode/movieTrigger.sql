Create Trigger addReview
After Insert 
on review
FOR EACH ROW
UPDATE movie
SET movie.rating = (SELECT AVG(rating) FROM review
			WHERE movie.mid = review.mid)
