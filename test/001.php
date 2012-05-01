<?php
namespace Test;
require_once "lib/my_math.php";

describe("Sum method of MyMath", function() {
  it("should return 15 if the input array contains only (1,2,3,4,5)", function($done) {
    if (\MyMath::sum(array(1,2,3,4,5)) === 15) return $done(true);
    else return $done(false);
  });
  it("should return 15 if the input is not an array but contains only (1,2,3,4,5)", function($done) {
    if (\MyMath::sum(1,2,3,4,5) === 15) return $done(true);
    else return $done(false);
  });
  it("should throw an exception with 'Invalid arguments.' message when the parameter list is empty", function($done) {
    try {
      \MyMath::sum();
      return $done(false);
    } catch(\Exception $e) {
      return $done(($e->getMessage() === "Invalid arguments."));
    }
  });
});

describe("Factorial method of MyMath", function() {
  it("should return 120 if the parameter is 5", function($done) {
    if (\MyMath::factorial(5) === 120) return $done(true);
    else return $done(false);
  });
  it("should return 1 if the parameter is 1", function($done) {
    if (\MyMath::factorial(1) === 1) return $done(true);
    else return $done(false);
  });
  it("should throw an exception if the parameter is 0", function($done) {
    try {
      \MyMath::factorial(0);
      return $done(false);
    } catch(\Exception $e) {
      return $done(($e->getMessage() === "Invalid argument."));
    }
  });
});