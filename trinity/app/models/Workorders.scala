package models

import slick.collection.heterogeneous.HNil
import slick.driver.MySQLDriver.api._


/**
 * Created by frye on 9/14/15.
 */
case class Workorder(id: Int,
                     `type`: Option[Int] = None,
                     userId: Option[Int] = None,
                     policyNumber: Option[String] = None,
                     firstName: Option[String] = None,
                     lastName: Option[String] = None,
                     streetAddress: Option[String] = None,
                     city: Option[String] = None,
                     state: Option[String] = None,
                     zip: Option[String] = None,
                     phone: Option[String] = None,
                     phone2: Option[String] = None,
                     createdOnUtc: Option[java.sql.Timestamp] = None,
                     isExpert: Option[Boolean] = None,
                     damageType: Option[String] = None,
                     dateOfLoss: Option[java.sql.Date] = None,
                     timeOfLoss: Option[java.sql.Time] = None,
                     interiorInspection: Option[Boolean] = None,
                     adjusterPresent: Option[Boolean] = None,
                     tarped: Option[Boolean] = None,
                     estimateScopeRequirement: Option[String] = None,
                     specialInstructions: Option[String] = None,
                     status: Int = 1,
                     inspectorId: Option[Int] = None,
                     inspectionStatus: Int = 1,
                     inspectionType: Option[Int] = None,
                     dateOfInspection: Option[java.sql.Date] = None,
                     timeOfInspection: Option[java.sql.Time] = None,
                     price: Option[Float] = None,
                     isGeneratedPdf: Option[Boolean] = Some(false),
                     lastGenerated: Option[java.sql.Timestamp] = None,
                     generateReportStatus: Option[String] = None,
                     comments: Option[String] = None,
                     commenterId: Option[Int] = None,
                     latitude: Option[Double] = None,
                     longtitude: Option[Double] = None,
                     pdfloc: Option[String] = None) {}


class Workorders (tag: Tag) extends Table[Workorders](tag, "work_orders") {

  /** Database column id DBType(BIGINT UNSIGNED), AutoInc, PrimaryKey */
  def id = column[Long]("id", O.AutoInc, O.PrimaryKey)
  /** Database column type DBType(INT UNSIGNED), Default(None)
    *  NOTE: The name was escaped because it collided with a Scala keyword. */
  def `type` = column[Option[Int]]("type", O.Default(None))
  /** Database column user_id DBType(INT UNSIGNED), Default(None) */
  def userId = column[Option[Int]]("user_id", O.Default(None))
  /** Database column policy_number DBType(VARCHAR), Length(250,true), Default(None) */
  def policyNumber = column[Option[String]]("policy_number", O.Length(250,varying=true), O.Default(None))
  /** Database column first_name DBType(VARCHAR), Length(200,true), Default(None) */
  def firstName = column[Option[String]]("first_name", O.Length(200,varying=true), O.Default(None))
  /** Database column last_name DBType(VARCHAR), Length(200,true), Default(None) */
  def lastName = column[Option[String]]("last_name", O.Length(200,varying=true), O.Default(None))
  /** Database column street_address DBType(VARCHAR), Length(200,true), Default(None) */
  def streetAddress = column[Option[String]]("street_address", O.Length(200,varying=true), O.Default(None))
  /** Database column city DBType(VARCHAR), Length(200,true), Default(None) */
  def city = column[Option[String]]("city", O.Length(200,varying=true), O.Default(None))
  /** Database column state DBType(VARCHAR), Length(250,true), Default(None) */
  def state = column[Option[String]]("state", O.Length(250,varying=true), O.Default(None))
  /** Database column zip DBType(VARCHAR), Length(5,true), Default(None) */
  def zip = column[Option[String]]("zip", O.Length(5,varying=true), O.Default(None))
  /** Database column phone DBType(VARCHAR), Length(30,true), Default(None) */
  def phone = column[Option[String]]("phone", O.Length(30,varying=true), O.Default(None))
  /** Database column phone2 DBType(VARCHAR), Length(30,true), Default(None) */
  def phone2 = column[Option[String]]("phone2", O.Length(30,varying=true), O.Default(None))
  /** Database column created_on_utc DBType(DATETIME), Default(None) */
  def createdOnUtc = column[Option[java.sql.Timestamp]]("created_on_utc", O.Default(None))
  /** Database column is_expert DBType(BIT), Default(None) */
  def isExpert = column[Option[Boolean]]("is_expert", O.Default(None))
  /** Database column damage_type DBType(VARCHAR), Length(200,true), Default(None) */
  def damageType = column[Option[String]]("damage_type", O.Length(200,varying=true), O.Default(None))
  /** Database column date_of_loss DBType(DATE), Default(None) */
  def dateOfLoss = column[Option[java.sql.Date]]("date_of_loss", O.Default(None))
  /** Database column time_of_loss DBType(TIME), Default(None) */
  def timeOfLoss = column[Option[java.sql.Time]]("time_of_loss", O.Default(None))
  /** Database column interior_inspection DBType(BIT), Default(None) */
  def interiorInspection = column[Option[Boolean]]("interior_inspection", O.Default(None))
  /** Database column adjuster_present DBType(BIT), Default(None) */
  def adjusterPresent = column[Option[Boolean]]("adjuster_present", O.Default(None))
  /** Database column tarped DBType(BIT), Default(None) */
  def tarped = column[Option[Boolean]]("tarped", O.Default(None))
  /** Database column estimate_scope_requirement DBType(TEXT), Length(65535,true), Default(None) */
  def estimateScopeRequirement = column[Option[String]]("estimate_scope_requirement", O.Length(65535,varying=true), O.Default(None))
  /** Database column special_instructions DBType(TEXT), Length(65535,true), Default(None) */
  def specialInstructions = column[Option[String]]("special_instructions", O.Length(65535,varying=true), O.Default(None))
  /** Database column status DBType(INT), Default(1) */
  def status = column[Int]("status", O.Default(1))
  /** Database column inspector_id DBType(INT UNSIGNED), Default(None) */
  def inspectorId = column[Option[Int]]("inspector_id", O.Default(None))
  /** Database column inspection_status DBType(INT), Default(1) */
  def inspectionStatus = column[Int]("inspection_status", O.Default(1))
  /** Database column inspection_type DBType(INT UNSIGNED), Default(None) */
  def inspectionType = column[Option[Int]]("inspection_type", O.Default(None))
  /** Database column date_of_inspection DBType(DATE), Default(None) */
  def dateOfInspection = column[Option[java.sql.Date]]("date_of_inspection", O.Default(None))
  /** Database column time_of_inspection DBType(TIME), Default(None) */
  def timeOfInspection = column[Option[java.sql.Time]]("time_of_inspection", O.Default(None))
  /** Database column price DBType(FLOAT UNSIGNED), Default(None) */
  def price = column[Option[Float]]("price", O.Default(None))
  /** Database column is_generated_pdf DBType(BIT), Default(Some(false)) */
  def isGeneratedPdf = column[Option[Boolean]]("is_generated_pdf", O.Default(Some(false)))
  /** Database column last_generated DBType(DATETIME), Default(None) */
  def lastGenerated = column[Option[java.sql.Timestamp]]("last_generated", O.Default(None))
  /** Database column generate_report_status DBType(VARCHAR), Length(30,true), Default(None) */
  def generateReportStatus = column[Option[String]]("generate_report_status", O.Length(30,varying=true), O.Default(None))
  /** Database column comments DBType(TEXT), Length(65535,true), Default(None) */
  def comments = column[Option[String]]("comments", O.Length(65535,varying=true), O.Default(None))
  /** Database column commenter_id DBType(INT UNSIGNED), Default(None) */
  def commenterId = column[Option[Int]]("commenter_id", O.Default(None))
  /** Database column latitude DBType(DOUBLE), Default(None) */
  def latitude = column[Option[Double]]("latitude", O.Default(None))
  /** Database column longtitude DBType(DOUBLE), Default(None) */
  def longtitude = column[Option[Double]]("longtitude", O.Default(None))
  /** Database column pdfLoc DBType(VARCHAR), Length(100,true), Default(None) */
  def pdfloc = column[Option[String]]("pdfLoc", O.Length(100,varying=true), O.Default(None))


  def * = (id, `type`, userId, policyNumber, firstName, lastName, streetAddress, city, state, zip, phone, phone2, createdOnUtc, isExpert, damageType, dateOfLoss, timeOfLoss, interiorInspection, adjusterPresent, tarped, estimateScopeRequirement, specialInstructions, status, inspectorId, inspectionStatus, inspectionType, dateOfInspection, timeOfInspection, price, isGeneratedPdf, lastGenerated, generateReportStatus, comments, commenterId, latitude, longtitude, pdfloc) <> ((Workorder.apply _).tupled, Workorder.unapply)
  def * = (id, email, username, password, logins, lastLogin, createdOnUtc, status) <> ((User.apply _).tupled, User.unapply)
}
