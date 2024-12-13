import { X } from "./test.js";



const appleSupport = s.support("apple");
const appleBeerConfidence = s.confidence(["apple"], ["beer"]);
const appleBeerLift = s.lift(["apple"], ["beer"]);


console.table({ appleSupport, appleBeerConfidence, appleBeerLift });
