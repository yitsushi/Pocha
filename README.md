Pocha
=====

Mocha like testing on PHP

Sample Test
===========

    describe("Sum method of MyMath", function() {
      it("should return 15 if the input array
          contains only (1,2,3,4,5)", function($done) {
        if (\MyMath::sum(array(1,2,3,4,5)) === 15) return $done(true);
        else return $done(false);
      });
      it("should return 15 if the input is
          not an array but contains only (1,2,3,4,5)", function($done) {
        if (\MyMath::sum(1,2,3,4,5) === 15) return $done(true);
        else return $done(false);
      });
      it("should throw an exception with
          'Invalid arguments.' message when the
           parameter list is empty", function($done) {
        try {
          \MyMath::sum();
          return $done(false);
        } catch(\Exception $e) {
          return $done(
            ($e->getMessage() === "Invalid arguments.")
          );
        }
      });
    });

Output
------

    ✔ Sum method of MyMath should return 15 if
        the input array contains only (1,2,3,4,5)
    ✔ Sum method of MyMath should return 15 if
        the input is not an array but contains only (1,2,3,4,5)
    ✔ Sum method of MyMath should throw an exception
        with 'Invalid arguments.' message when the parameter list is empty
      3 test / 3 passed / 0 failed
