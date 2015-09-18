package models

import dao.UsersDAO
import models.User

/**
 * Created by frye on 9/17/15.
 */
trait WorkOrder {
  val profile: slick.driver.JdbcProfile
  import profile.api._
  import slick.model.ForeignKeyAction
  import slick.collection.heterogeneous._
  import slick.collection.heterogeneous.syntax._
  // NOTE: GetResult mappers for plain SQL are only generated for tables where Slick knows how to map the types of all columns.
  import slick.jdbc.{GetResult => GR}
  import play.api.libs.json._
  import play.api.libs.json.Reads._

  // Type & Define this.
  type WorkOrder = HCons[Long,HCons[Option[Int],HCons[Option[Int],HCons[Option[String],HCons[Option[String],HCons[Option[String],HCons[Option[String],HCons[Option[String],HCons[Option[String],HCons[Option[String],HCons[Option[String],HCons[Option[String],HCons[Option[java.sql.Timestamp],HCons[Option[Boolean],HCons[Option[String],HCons[Option[java.sql.Date],HCons[Option[java.sql.Time],HCons[Option[Boolean],HCons[Option[Boolean],HCons[Option[Boolean],HCons[Option[String],HCons[Option[String],HCons[Int,HCons[Option[Int],HCons[Int,HCons[Option[Int],HCons[Option[java.sql.Date],HCons[Option[java.sql.Time],HCons[Option[Float],HCons[Option[Boolean],HCons[Option[java.sql.Timestamp],HCons[Option[String],HCons[Option[String],HCons[Option[Int],HCons[Option[Double],HCons[Option[Double],HCons[Option[String],HNil]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]
  def WorkOrder(id: Long, `type`: Option[Int] = None, userId: Option[Int] = None, policyNumber: Option[String] = None, firstName: Option[String] = None, lastName: Option[String] = None, streetAddress: Option[String] = None, city: Option[String] = None, state: Option[String] = None, zip: Option[String] = None, phone: Option[String] = None, phone2: Option[String] = None, createdOnUtc: Option[java.sql.Timestamp] = None, isExpert: Option[Boolean] = None, damageType: Option[String] = None, dateOfLoss: Option[java.sql.Date] = None, timeOfLoss: Option[java.sql.Time] = None, interiorInspection: Option[Boolean] = None, adjusterPresent: Option[Boolean] = None, tarped: Option[Boolean] = None, estimateScopeRequirement: Option[String] = None, specialInstructions: Option[String] = None, status: Int = 1, inspectorId: Option[Int] = None, inspectionStatus: Int = 1, inspectionType: Option[Int] = None, dateOfInspection: Option[java.sql.Date] = None, timeOfInspection: Option[java.sql.Time] = None, price: Option[Float] = None, isGeneratedPdf: Option[Boolean] = Some(false), lastGenerated: Option[java.sql.Timestamp] = None, generateReportStatus: Option[String] = None, comments: Option[String] = None, commenterId: Option[Int] = None, latitude: Option[Double] = None, longtitude: Option[Double] = None, pdfloc: Option[String] = None): WorkOrder = {
    id :: `type` :: userId :: policyNumber :: firstName :: lastName :: streetAddress :: city :: state :: zip :: phone :: phone2 :: createdOnUtc :: isExpert :: damageType :: dateOfLoss :: timeOfLoss :: interiorInspection :: adjusterPresent :: tarped :: estimateScopeRequirement :: specialInstructions :: status :: inspectorId :: inspectionStatus :: inspectionType :: dateOfInspection :: timeOfInspection :: price :: isGeneratedPdf :: lastGenerated :: generateReportStatus :: comments :: commenterId :: latitude :: longtitude :: pdfloc :: HNil
  }

  class WorkOrders(_tableTag: Tag) extends Table[WorkOrder](_tableTag, "work_orders") with User {
    def profile = slick.driver.JdbcProfile

    def * = id :: `type` :: userId :: policyNumber :: firstName :: lastName :: streetAddress :: city :: state :: zip :: phone :: phone2 :: createdOnUtc :: isExpert :: damageType :: dateOfLoss :: timeOfLoss :: interiorInspection :: adjusterPresent :: tarped :: estimateScopeRequirement :: specialInstructions :: status :: inspectorId :: inspectionStatus :: inspectionType :: dateOfInspection :: timeOfInspection :: price :: isGeneratedPdf :: lastGenerated :: generateReportStatus :: comments :: commenterId :: latitude :: longtitude :: pdfloc :: HNil

    /** Database column id SqlType(BIGINT UNSIGNED), AutoInc, PrimaryKey */
    val id: Rep[Long] = column[Long]("id", O.AutoInc, O.PrimaryKey)
    /** Database column type SqlType(INT UNSIGNED), Default(None)
      *  NOTE: The name was escaped because it collided with a Scala keyword. */
    val `type`: Rep[Option[Int]] = column[Option[Int]]("type", O.Default(None))
    /** Database column user_id SqlType(INT UNSIGNED), Default(None) */
    val userId: Rep[Option[Int]] = column[Option[Int]]("user_id", O.Default(None))
    /** Database column policy_number SqlType(VARCHAR), Length(250,true), Default(None) */
    val policyNumber: Rep[Option[String]] = column[Option[String]]("policy_number", O.Length(250,varying=true), O.Default(None))
    /** Database column first_name SqlType(VARCHAR), Length(200,true), Default(None) */
    val firstName: Rep[Option[String]] = column[Option[String]]("first_name", O.Length(200,varying=true), O.Default(None))
    /** Database column last_name SqlType(VARCHAR), Length(200,true), Default(None) */
    val lastName: Rep[Option[String]] = column[Option[String]]("last_name", O.Length(200,varying=true), O.Default(None))
    /** Database column street_address SqlType(VARCHAR), Length(200,true), Default(None) */
    val streetAddress: Rep[Option[String]] = column[Option[String]]("street_address", O.Length(200,varying=true), O.Default(None))
    /** Database column city SqlType(VARCHAR), Length(200,true), Default(None) */
    val city: Rep[Option[String]] = column[Option[String]]("city", O.Length(200,varying=true), O.Default(None))
    /** Database column state SqlType(VARCHAR), Length(250,true), Default(None) */
    val state: Rep[Option[String]] = column[Option[String]]("state", O.Length(250,varying=true), O.Default(None))
    /** Database column zip SqlType(VARCHAR), Length(5,true), Default(None) */
    val zip: Rep[Option[String]] = column[Option[String]]("zip", O.Length(5,varying=true), O.Default(None))
    /** Database column phone SqlType(VARCHAR), Length(30,true), Default(None) */
    val phone: Rep[Option[String]] = column[Option[String]]("phone", O.Length(30,varying=true), O.Default(None))
    /** Database column phone2 SqlType(VARCHAR), Length(30,true), Default(None) */
    val phone2: Rep[Option[String]] = column[Option[String]]("phone2", O.Length(30,varying=true), O.Default(None))
    /** Database column created_on_utc SqlType(DATETIME), Default(None) */
    val createdOnUtc: Rep[Option[java.sql.Timestamp]] = column[Option[java.sql.Timestamp]]("created_on_utc", O.Default(None))
    /** Database column is_expert SqlType(BIT), Default(None) */
    val isExpert: Rep[Option[Boolean]] = column[Option[Boolean]]("is_expert", O.Default(None))
    /** Database column damage_type SqlType(VARCHAR), Length(200,true), Default(None) */
    val damageType: Rep[Option[String]] = column[Option[String]]("damage_type", O.Length(200,varying=true), O.Default(None))
    /** Database column date_of_loss SqlType(DATE), Default(None) */
    val dateOfLoss: Rep[Option[java.sql.Date]] = column[Option[java.sql.Date]]("date_of_loss", O.Default(None))
    /** Database column time_of_loss SqlType(TIME), Default(None) */
    val timeOfLoss: Rep[Option[java.sql.Time]] = column[Option[java.sql.Time]]("time_of_loss", O.Default(None))
    /** Database column interior_inspection SqlType(BIT), Default(None) */
    val interiorInspection: Rep[Option[Boolean]] = column[Option[Boolean]]("interior_inspection", O.Default(None))
    /** Database column adjuster_present SqlType(BIT), Default(None) */
    val adjusterPresent: Rep[Option[Boolean]] = column[Option[Boolean]]("adjuster_present", O.Default(None))
    /** Database column tarped SqlType(BIT), Default(None) */
    val tarped: Rep[Option[Boolean]] = column[Option[Boolean]]("tarped", O.Default(None))
    /** Database column estimate_scope_requirement SqlType(TEXT), Default(None) */
    val estimateScopeRequirement: Rep[Option[String]] = column[Option[String]]("estimate_scope_requirement", O.Default(None))
    /** Database column special_instructions SqlType(TEXT), Default(None) */
    val specialInstructions: Rep[Option[String]] = column[Option[String]]("special_instructions", O.Default(None))
    /** Database column status SqlType(INT), Default(1) */
    val status: Rep[Int] = column[Int]("status", O.Default(1))
    /** Database column inspector_id SqlType(INT UNSIGNED), Default(None) */
    val inspectorId: Rep[Option[Int]] = column[Option[Int]]("inspector_id", O.Default(None))
    /** Database column inspection_status SqlType(INT), Default(1) */
    val inspectionStatus: Rep[Int] = column[Int]("inspection_status", O.Default(1))
    /** Database column inspection_type SqlType(INT UNSIGNED), Default(None) */
    val inspectionType: Rep[Option[Int]] = column[Option[Int]]("inspection_type", O.Default(None))
    /** Database column date_of_inspection SqlType(DATE), Default(None) */
    val dateOfInspection: Rep[Option[java.sql.Date]] = column[Option[java.sql.Date]]("date_of_inspection", O.Default(None))
    /** Database column time_of_inspection SqlType(TIME), Default(None) */
    val timeOfInspection: Rep[Option[java.sql.Time]] = column[Option[java.sql.Time]]("time_of_inspection", O.Default(None))
    /** Database column price SqlType(FLOAT UNSIGNED), Default(None) */
    val price: Rep[Option[Float]] = column[Option[Float]]("price", O.Default(None))
    /** Database column is_generated_pdf SqlType(BIT), Default(Some(false)) */
    val isGeneratedPdf: Rep[Option[Boolean]] = column[Option[Boolean]]("is_generated_pdf", O.Default(Some(false)))
    /** Database column last_generated SqlType(DATETIME), Default(None) */
    val lastGenerated: Rep[Option[java.sql.Timestamp]] = column[Option[java.sql.Timestamp]]("last_generated", O.Default(None))
    /** Database column generate_report_status SqlType(VARCHAR), Length(30,true), Default(None) */
    val generateReportStatus: Rep[Option[String]] = column[Option[String]]("generate_report_status", O.Length(30,varying=true), O.Default(None))
    /** Database column comments SqlType(TEXT), Default(None) */
    val comments: Rep[Option[String]] = column[Option[String]]("comments", O.Default(None))
    /** Database column commenter_id SqlType(INT UNSIGNED), Default(None) */
    val commenterId: Rep[Option[Int]] = column[Option[Int]]("commenter_id", O.Default(None))
    /** Database column latitude SqlType(DOUBLE), Default(None) */
    val latitude: Rep[Option[Double]] = column[Option[Double]]("latitude", O.Default(None))
    /** Database column longtitude SqlType(DOUBLE), Default(None) */
    val longtitude: Rep[Option[Double]] = column[Option[Double]]("longtitude", O.Default(None))
    /** Database column pdfLoc SqlType(VARCHAR), Length(100,true), Default(None) */
    val pdfloc: Rep[Option[String]] = column[Option[String]]("pdfLoc", O.Length(100,varying=true), O.Default(None))

    /** Foreign key referencing InspectionTypes (database name fk_inspection_types) */
    // lazy val inspectionTypesFk = foreignKey("fk_inspection_types", `type` :: HNil, InspectionTypes)(r => Rep.Some(r.id) :: HNil, onUpdate=ForeignKeyAction.NoAction, onDelete=ForeignKeyAction.NoAction)
    /** Foreign key referencing Users (database name fk_comment_to_user) */
    lazy val usersFk = foreignKey("fk_comment_to_user", commenterId :: HNil, users)(r => Rep.Some(r.id) :: HNil, onUpdate=ForeignKeyAction.NoAction, onDelete=ForeignKeyAction.NoAction)
  }
  /** Collection-like TableQuery object for table WorkOrders */
  lazy val WorkOrders = new TableQuery(tag => new WorkOrders(tag))
}
